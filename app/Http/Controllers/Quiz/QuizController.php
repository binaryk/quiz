<?php  namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;

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
        $input   = \Input::all();
        dd($input);

        $file = $input['file_data'];
        $file->move( public_path() . '/uploads',  'test.png');
        return $result = \Response::json(['success' => true, 'message' => 'Upload. OK']);
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
