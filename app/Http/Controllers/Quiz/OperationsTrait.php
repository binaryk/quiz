<?php namespace App\Http\Controllers\Quiz;
use App\Http\Controllers\Controller;
use App\Quiz;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

trait OperationsTrait{
    public function asString($string)
    {
        return '"' . $string . '"';
    }

    public function readFile1($data)
    {

        $contents = File::get(config('destinations.'. $this->lang .'.in1'));
        //REPLACE LA NUME QUIZ
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        $contents = str_replace("[[QUIZ_NAME]]",$data['title_quiz'], $contents);
        // replace class name
        $contents = str_replace("[[CLASS_NAME]]",ucwords($data['title_quiz']), $contents);
        // replace simple
        if(array_key_exists('coperta', $data)){
            $simple_name = $data['coperta']->getClientOriginalName();
            $contents = str_replace("[[SIMPLE_NAME]]",$simple_name, $contents);
        }

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
        // X
        $contents = str_replace("[[WIDTH]]",$data['width'], $contents);
        // Y
        $contents = str_replace("[[HEIGHT]]",$data['height'], $contents);
        // COLOR
        if($data['color'] !== "fe9810"){
            $col = rtrim($data['color'], ")");
            $color = ltrim($col, "rgb(");
        }else{
            $color = "255, 255, 255";
        }
        $this->object['color'] = $color;
        $contents = str_replace("[[COLOR]]",$color, $contents);
        // ROUND photo
        if(array_key_exists('round',$data)){
            $contents = str_replace("[[ROUND]]",' ', $contents);
        }else{
            $contents = str_replace("[[ROUND]]",'//', $contents);
        }

        // RANDOM
        $contents = str_replace("[[COUNTER]]",count($data['photos']), $contents);

        switch($data['option']){
            case "1":
                //ambele
                $text = $this->getTextInImage($data);


//                $contents = $this->replaceText($data, $contents);
                $contents = str_replace("[[TEXT_IMAGE]]",$text, $contents);
                $contents = str_replace("[[ONLY_TEXT_START]]",' ', $contents);
                $contents = str_replace("[[ONLY_TEXT_STOP]]",' ', $contents);
                break;
            case "2":
                //poza
                $contents = str_replace("[[NAME_OPTION]]",'//', $contents);
                $contents = str_replace("[[FULL_NAME_OPTION]]",'//', $contents);
                $contents = str_replace("[[TEXT_IMAGE]]",' ', $contents);
                $contents = str_replace("[[ONLY_TEXT_START]]",' ', $contents);
                $contents = str_replace("[[ONLY_TEXT_STOP]]",' ', $contents);
                break;
            case "3":
                //text
//                $contents = $this->replaceText($data, $contents);
                $text = $this->getTextInImage($data);

                $contents = str_replace("[[TEXT_IMAGE]]",$text, $contents);

                $contents = str_replace("[[ONLY_TEXT_START]]",'/*', $contents);
                $contents = str_replace("[[ONLY_TEXT_STOP]]",'*/', $contents);
                break;
        }
        $this->object['controller_path'] = config('destinations.'. $this->lang .'.out1').$title.'.php';
        File::put(config('destinations.'. $this->lang .'.out1').$title.'.php', $contents);

    }

    public function getTextInImage($data)
    {

        if(strlen($data['text']) > 0){
            $text = $data['text'];
            $text = str_replace("\$fullname",' ".$fullname." ', $text);
            $text = str_replace("\$name",' ".$name . " ', $text);
            $text = '"' . $text . '"';
            $out  = '$font_size = getSize($font_path, '.floatval($data['text_height']).', '.$text.');';
            $out .= 'imagettfstroketext($dest, $font_size, 0, '.(floatval($data["text_x"]) - floatval(5)).','.(floatval($data["text_y"]) + floatval($data["text_height"])).', $white, $black, $font_path, '.$text.', 2);';
            return $out;
        }
        return ' ';
    }

    public function withoutQ($str)
    {
        return str_replace('"','', $str);
    }

    public function replaceText($data, $contents)
    {
        if(strpos($data['text'], '$name') !== false){
            $contents = str_replace("[[FULL_NAME_OPTION]]",'//', $contents);
            $contents = str_replace("[[NAME_OPTION]]",' ', $contents);
            $tmp      = $this->asString($data['text']);
            //$this->object['text'] = $tmp;
            $text     = str_replace("\$name",' ".$name . " ', $tmp);
            $contents = str_replace("[[NAME]]",$text, $contents);
        }else if(strpos($data['text'], '$fullname') !== false){
            $contents = str_replace("[[NAME_OPTION]]",'//', $contents);
            $contents = str_replace("[[FULL_NAME_OPTION]]",' ', $contents);
            $tmp      = $this->asString($data['text']);
            //$this->object['text'] = $tmp;
            $text     = str_replace("\$fullname",' ".$fullname . " ', $tmp);
            $contents = str_replace("[[FULL_NAME]]",$text, $contents);
        }else{
            $contents = str_replace("[[NAME_OPTION]]",'//', $contents);
            $contents = str_replace("[[FULL_NAME_OPTION]]",'//', $contents);
        }
        $contents = str_replace("[[TEXT_X]]",floatval($data['text_x']) - floatval(5), $contents);
        $contents = str_replace("[[TEXT_Y]]",floatval($data['text_y']) + floatval($data['text_height']), $contents);
        $contents = str_replace("[[TEXT_WIDTH]]",floatval($data['text_width']), $contents);
        $contents = str_replace("[[TEXT_HEIGHT]]",floatval($data['text_height']), $contents);
        return $contents;
    }

    public function readFile2($data)
    {
        $contents = File::get(config('destinations.'. $this->lang .'.in2'));
        //REPLACE LA NUME QUIZ
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        $contents = str_replace("[[QUIZ_NAME]]",$data['title_quiz'], $contents);
        // replace class name
        $contents = str_replace("[[CLASS_NAME]]",ucwords($data['title_quiz']), $contents);
        // replace simple
        if(array_key_exists('coperta', $data)) {
            $simple_name = $data['coperta']->getClientOriginalName();
            $contents = str_replace("[[SIMPLE_NAME]]", $simple_name, $contents);
        }
        // TITLE de jos
        $contents = str_replace("[[TITLE]]",$this->asString($data['title']), $contents);
        // OG_TITLE
        $contents = str_replace("[[OG_TITLE]]",$this->asString($data['ogtitle']), $contents);
        // DESCRIPTION
        $contents = str_replace("[[DESCRIPTION]]",$this->asString($data['description']), $contents);
        // MESSAGE
        if(strpos($data['title_view'], '$name') !== false) {
            $tmp      = $this->asString($data['title_view']);
            $view     = str_replace("\$name","' .\$name . '", $tmp);
        }else{
            $view = $data['title_view'];
        }
//        $this->object['title_view'] = $view;
        //WOW, '.$name.'! You look so imposing when you are angry. Share this with your friends, let them know
        $contents = str_replace("[[MESSAGE]]",$view, $contents);
        $this->object['view_path'] = config('destinations.'. $this->lang .'.out2').$title.'.php';
        File::put(config('destinations.'. $this->lang .'.out2').$title.'.php', $contents);
    }

    public function asStringVar($var = '')
    {
        return "'.\$name.' ";
    }

    public function makeFolder($data)
    {
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        if($data['lang'] === 'ro'){
            if (! mkdir('/var/www/html/ro/uploads/'. $title, 0777, true)) {
                die('Failed to create folders...');
            }
            $this->object['upload_path'] = '/var/www/html/ro/uploads/'. $title;
        }else{
            if(! file_exists('/var/www/html/uploads/'. $title)){
                if (! mkdir('/var/www/html/uploads/'. $title, 0777, true)) {
                    die('Failed to create folders...');
                }
            }
            $this->object['upload_path'] = '/var/www/html/uploads/'. $title;
        }

    }

    public function makePhotosFolder($data)
    {
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        if (! file_exists(config('destinations.'. $this->lang .'.photos_dest'). $title) &&  ! mkdir(config('destinations.'. $this->lang .'.photos_dest'). $title, 0777, true)) {
            die('Failed to create folders...');
        }
    }

    public function moveSample($data)
    {
        if(array_key_exists('coperta', $data)) {
            $simple_name = $data['coperta']->getClientOriginalName();
            $this->object['sample_path'] = config('destinations.'. $this->lang .'.sample') . $simple_name;
            $path = $data['coperta']->move(config('destinations.'. $this->lang .'.sample'), $simple_name);
        }
    }

    public function moveCoords($data)
    {
            $image = $data['coordonate'];
            $name = $image->getClientOriginalName();
            $path = $image->move(config('destinations.'. $this->lang .'.local_coords'), $name);
            return [
                'path' => $path->getRealPath(),
                'name' => $name,
            ];
    }

    public function moveCoordsText($data)
    {
            $image = $data['coordonate_text'];
            $name = $image->getClientOriginalName();
            $path = $image->move(config('destinations.'. $this->lang .'.local_coords'), $name);
            return [
                'path' => $path->getRealPath(),
                'name' => $name,
            ];
    }

    public function moveImages($data)
    {
        $title = strtolower($data['title_quiz']);
        $title = trim($title);
        foreach($data['photos'] as $k => $image){
            if($image){
                $name = $image->getClientOriginalName();
                $this->object['photos_path'] = config('destinations.'. $this->lang .'.photos_dest'). $title;
                $image->move(config('destinations.'. $this->lang .'.photos_dest'). $title, $name);
            }
        }
    }

    public function rules()
    {
        shell_exec('chown -R www-data:www-data /var/www/html');
        exec('chown -R www-data:www-data /var/www/html');
    }

    public function insert($data)
    {

        Quiz::create($data);
    }

    public function controls()
    {
        return [
            'title_quiz' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('title_quiz')
                    ->placeholder('catlook')
                    ->caption('Quiz name')
                    ->class('form-control data-source')
                    ->controlsource('title_quiz')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'title' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('title')
                    ->placeholder('How Would You Look If You Were A Cat?')
                    ->caption('Title')
                    ->class('form-control data-source')
                    ->controlsource('title')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'ogtitle' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('ogtitle')
                    ->placeholder('How Would You Look If You Were A Cat?')
                    ->caption('Og Title')
                    ->class('form-control data-source')
                    ->controlsource('ogtitle')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'title_view' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('title_view')
                    ->placeholder('WOW, $name ! You look so imposing when you are angry. Share this with your friends, let them know ')
                    ->help('Se poate pune cu variabila $name')
                    ->caption('Title view')
                    ->class('form-control data-source')
                    ->controlsource('title_view')
                    ->controltype('textbox')
                    ->maxlength(255)
                    ->out(),
            'text' =>
                \Easy\Form\Textbox::make('~layouts.form.controls.textboxes.textbox')
                    ->name('text')
                    ->placeholder('$name/$fullname, you are the best! ')
                    ->caption('Title view')
                    ->class('form-control data-source')
                    ->controlsource('text')
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
                    ->maxlength(3555)
                    ->out(),
        ];
    }
}