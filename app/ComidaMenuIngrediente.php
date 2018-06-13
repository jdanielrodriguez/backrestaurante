<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComidaMenuIngrediente extends Model
{
    protected $table = 'comida_menu_ingrediente';

    public function ingrediente(){
        return $this->hasOne('App\Ingredientes','id','ingrediente');
    }
}
