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

    public function index()
    {
        return view('quiz.index')->with(
            ['controls' => $this->controls()]
        );
    }

    public function coperta()
    {
        $input   = Input::all();
        $file = $input['coperta'];
        $file->move( public_path() . '/uploads',  $input['title'].'.png');
        return $result = \Response::json(['success' => true, 'message' => 'Upload. OK']);
    }

    public function store()
    {


        $input = Input::all();
        $this->readFile1();
        $input   = Input::all();
        $file = $input['coperta'];
//        $file->move( public_path() . '/uploads',  $input['title'].'.png');
        dd($input);


    }

    public function readFile1()
    {

        $contents = File::get(config('destinations.in1'));
        $contents = str_replace("[[NAME]]", "EDUARD", $contents);
        File::put("C:\\xampp\\file2.php", $contents);

    }

    public function controls()
    {
        return [
            'title_quiz' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('title_quiz')
                    ->caption('Title quiz')
                    ->class('form-control data-source')
                    ->controlsource('title_quiz')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'title' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('title')
                    ->caption('Title')
                    ->class('form-control data-source')
                    ->controlsource('title')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'ogtitle' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('ogtitle')
                    ->caption('Og Title')
                    ->class('form-control data-source')
                    ->controlsource('ogtitle')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'description' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.editboxes.editbox')
                    ->name('description')
                    ->caption('Dscription')
                    ->class('form-control data-source')
                    ->controlsource('description')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
        ];
    }



}
