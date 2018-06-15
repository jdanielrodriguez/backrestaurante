<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuentas extends Model
{
    use SoftDeletes;
    protected $table = 'cuentas';

    public function menus(){
        return $this->hasMany('App\Menus','cuenta','id')->with('comidas');
    }
}
