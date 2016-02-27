<?php namespace App\Http\Controllers\Quiz;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

trait OperationsTrait{
    public function asString($string)
    {
        return '"' . $string . '"';
    }

    public function readFile1($data)
    {
        $contents = File::get(config('destinations.in1'));
        //REPLACE LA NUME QUIZ
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        $contents = str_replace("[[QUIZ_NAME]]",$data['title_quiz'], $contents);
        // replace class name
        $contents = str_replace("[[CLASS_NAME]]",ucwords($data['title_quiz']), $contents);
        // replace simple
//        $simple_name = $data['coperta']->getClientOriginalName();
        $simple_name = $data['coperta_name'];
        $contents = str_replace("[[SIMPLE_NAME]]",$simple_name, $contents);
        // TITLE de jos
        $contents = str_replace("[[TITLE]]",$this->asString($data['title']), $contents);
        // OG_TITLE
        $contents = str_replace("[[OG_TITLE]]",$this->asString($data['ogtitle']), $contents);
        // DESCRIPTION
        $contents = str_replace("[[DESCRIPTION]]",$this->asString($data['description']), $contents);
        // X
        $contents = str_replace("[[X]]",$data['x'], $contents);
        // Y
        $contents = str_replace("[[Y]]",$data['y'], $contents);

        File::put(config('destinations.out1').$title.'.php', $contents);

    }

    public function readFile2($data)
    {
        $contents = File::get(config('destinations.in2'));
        //REPLACE LA NUME QUIZ
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        $contents = str_replace("[[QUIZ_NAME]]",$data['title_quiz'], $contents);
        // replace class name
        $contents = str_replace("[[CLASS_NAME]]",ucwords($data['title_quiz']), $contents);
        // replace simple
//        $simple_name = $data['coperta']->getClientOriginalName();
        $simple_name = $data['coperta_name'];
        $contents = str_replace("[[SIMPLE_NAME]]",$simple_name, $contents);
        // TITLE de jos
        $contents = str_replace("[[TITLE]]",$this->asString($data['title']), $contents);
        // OG_TITLE
        $contents = str_replace("[[OG_TITLE]]",$this->asString($data['ogtitle']), $contents);
        // DESCRIPTION
        $contents = str_replace("[[DESCRIPTION]]",$this->asString($data['description']), $contents);

        File::put(config('destinations.out2').$title.'.php', $contents);

    }

    public function makeFolder($data)
    {
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        if (! file_exists(config('destinations.new_folder'). $title) &&  ! mkdir(config('destinations.new_folder'). $title, 0777, true)) {
            die('Failed to create folders...');
        }
    }

    public function makePhotosFolder($data)
    {
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        if (! file_exists(config('destinations.photos_dest'). $title) &&  ! mkdir(config('destinations.photos_dest'). $title, 0777, true)) {
            die('Failed to create folders...');
        }
    }

    public function moveSample($data)
    {
        $simple_name = $data['coperta']->getClientOriginalName();
        $path = $data['coperta']->move( config('destinations.sample'),  $simple_name);
        copy ( $path , config('destinations.server_sample') . $simple_name );
        return [
            'path' => $path->getRealPath(),
            'name' => $simple_name,
        ];
    }

    public function moveImages($data)
    {
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        foreach($data['photos'] as $k => $image){
            $name = $image->getClientOriginalName();
            $image->move(config('destinations.photos_dest'). $title, $name);
        }
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
                    ->help('Care apare jos, sub poza')
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