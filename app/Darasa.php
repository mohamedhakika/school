<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Darasa extends Model
{
    use SoftDeletes;
    protected $table = 'classes';
    protected $dates = ['deleted_at'];
}
