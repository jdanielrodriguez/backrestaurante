<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Combos extends Model
{
    use SoftDeletes;
    protected $table = 'combos';
}
