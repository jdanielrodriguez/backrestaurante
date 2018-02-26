<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComidaMenu extends Model
{
    use SoftDeletes;
    protected $table = 'comida_menu';
}
