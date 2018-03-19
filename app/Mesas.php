<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesas extends Model
{
    use SoftDeletes;
    protected $table = 'mesas';

    public function cuentasHabilitadas(){
        return $this->hasMany('App\Cuentas','mesa','id')->whereRaw('estado>0');
    }

    public function cuentasPagadas(){
        return $this->hasMany('App\Cuentas','mesa','id')->whereRaw('estado=0');
    }

    public function cuentas(){
        return $this->hasMany('App\Cuentas','mesa','id');
    }
}
