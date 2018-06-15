<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use SoftDeletes;
    protected $table = 'menus';

    public function comidas(){
        return $this->hasMany('App\ComidaMenu','menu','id')->with('comidas','ingredientes');
    }
}
