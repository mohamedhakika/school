<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kidato extends Model
{
    use SoftDeletes;

    protected $table = 'vidato';
    protected $dates = ['deleted_at'];
}
