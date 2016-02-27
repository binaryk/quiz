<?php  namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class QuizController extends Controller
{
    use OperationsTrait;

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

    public function store()
    {

        $input = Input::all();
        // controller
        $this->readFile1($input);
        // view
        $this->readFile2($input);
        ///var/www/html/ro/uploads/
//        if(env('APP_ENV') != 'local'){
            $this->makeFolder($input);
//        }
        // upload simple
        $this->moveSample($input);
        $this->makePhotosFolder($input);
        $this->moveImages($input);
//        $this->rules();
        return redirect()->back();
    }





}
