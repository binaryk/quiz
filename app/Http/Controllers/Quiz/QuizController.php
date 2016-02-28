<?php  namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Quiz;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class QuizController extends Controller
{
    use OperationsTrait;
    public $lang;
    public $object;
    public function __construct()
    {
      $this->lang = 'en';
      $this->object = [];
    }

    public function index()
    {
        return view('quiz.index')->with(
            ['controls' => $this->controls()]
        );
    }

    public function coordonate()
    {
        $input   = Input::all();
        $upload = $this->moveCoords($input);
        return $result = \Response::json(['success' => true, 'message' => 'Upload. OK', 'path' => asset('out/coords/'.$upload['name']),'name' => $upload['name']]);
    }

    public function coordonate_text()
    {
        $input   = Input::all();
        $upload = $this->moveCoordsText($input);
        return $result = \Response::json(['success' => true, 'message' => 'Upload. OK', 'path' => asset('out/coords/'.$upload['name']),'name' => $upload['name']]);
    }

    public function lists()
    {
        $quizes = Quiz::all();
        return view('quiz.list')->with(compact('quizes'));
    }

    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        if(file_exists($quiz->controller_path)){
            unlink($quiz->controller_path);
        }
        if(file_exists($quiz->upload_path)){
            unlink($quiz->upload_path);
        }
        if(file_exists($quiz->view_path)){
            unlink($quiz->view_path);
        }

        $quiz->delete();

        return Response::json(['message' => 'Stergere cu success']);
    }

    public function store()
    {

        $input = Input::all();
        if(Quiz::where('title_quiz', $input['title_quiz'])->first()){
            return redirect()->back()->withInput();
        }
        $this->object = [
            "lang"                    => $input['lang'],
            "title_quiz"              => $input['title_quiz'],
            "title"                   => $input['title'],
            "ogtitle"                 => $input['ogtitle'],
            "description"             => $input['description'],
            "option"                  => $input['option'],
            "height"                  => $input['height'],
            "width"                   => $input['width'],
            "coordonate_name"         => $input['coordonate_name'],
            "text_height"             => $input['text_height'],
            "text_width"              => $input['text_width'],
            "photos"                  => $input['photos'],
            "color"                   => $input['color'],
        ];
        $this->lang = $input['lang'];

        // controller
        $this->readFile1($input);
        // view
        $this->readFile2($input);
        ///var/www/html/ro/uploads/
        if(env('APP_ENV') !== 'local'){
            $this->makeFolder($input);
        }
        // upload simple
        $this->moveSample($input);
        $this->makePhotosFolder($input);
        $this->moveImages($input);
        $this->insert($this->object);
//        $this->rules();
        return redirect()->back();
    }





}
