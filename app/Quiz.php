<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizes';
    protected $guarded  = ['photos','text_width','text_height','coordonate_name','width','height'];

}
