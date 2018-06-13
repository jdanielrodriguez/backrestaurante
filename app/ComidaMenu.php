<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComidaMenu extends Model
{
    protected $table = 'comida_menu';

    public function ingredientes(){
        return $this->hasMany('App\ComidaMenuIngrediente','comida_menu','id')->with('ingrediente');
    }
}
