<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class , 'teacher_subjects')->withPivot( 'id', 'class_id', 'year');
    }

    public function teaching_classes()
    {
        return $this->belongsToMany(Darasa::class , 'teacher_subjects', 'teacher_id','class_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function classes()
    {
        return $this->belongsToMany(Darasa::class , 'class_teacher', 'teacher_id','class_id')
                                    ->withPivot('id')
                                    ->orderBy('name')
                                    ->orderBy('stream');
    }
}
