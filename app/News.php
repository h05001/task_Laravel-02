<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  //laravel15で追記
  protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
}
