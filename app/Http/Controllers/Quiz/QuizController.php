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

    public function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {

        for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
            for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
                $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);

        return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
    }

    public function getSize($font_path, $w, $text)
    {
        $font_size = 1;
        $txt_max_width = $w;
        do {

            $font_size++;
            $p = imagettfbbox($font_size,0,$font_path, $text);
            $txt_width=$p[2]-$p[0];
        } while ($txt_width <= $txt_max_width);
        return $font_size;

    }

    public function index()
    {

//        $dest = imagecreatefromjpeg(public_path('uploads/img.jpg'));
//        $white = imageColorAllocate($dest, 215,123,0);
//        $font_path = public_path() . '/font/arialblack.ttf';
//        $text =  "Text sample eduard are mere." ;
//        $font_size = $this->getSize($font_path, 120, $text);
//        $black = ImageColorAllocate($dest, 0, 0, 0);
//        $this->imagettfstroketext($dest, $font_size, 0, 150, 500, $white, $black, $font_path, $text, 2);
//
//        Imagealphablending($dest, false);
//        Imagesavealpha($dest, true);
//        imagejpeg($dest, public_path() . '/uploads/test.jpg');
        return view('quiz.index')->with(
            ['controls' => $this->controls(),]
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
            $this->rrmdir($quiz->upload_path);
        }
        if(file_exists($quiz->photos_path)){
            $this->rrmdir($quiz->photos_path);
        }
        if(file_exists($quiz->view_path)){
            unlink($quiz->view_path);
        }
        if(file_exists($quiz->sample_path)){
            unlink($quiz->sample_path);
        }

        $quiz->delete();

        return Response::json(['message' => 'Stergere cu success']);
    }

    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    public function store()
    {

        $input = Input::all();
        if(Quiz::where('title_quiz', $input['title_quiz'])->where('lang',$input['lang'])->first()){
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
        $this->rules();
        return redirect()->back();
    }

    public function sync()
    {
        $quizes = Quiz::get();
        $this->shufhome($quizes);
        $this->shufright($quizes);
        $this->shufdown($quizes);
    }

    public function shufhome($quizes = [])
    {

//        $path = config('')
    }

    public function shufright($quizes = [])
    {

    }

    public function shufdown($quizes = [])
    {

    }





}
