<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'reg_no', 'address', 'mobile_no',
        'first_name', 'middle_name', 'last_name',
        'dob', 'year_admitted', 'status', 'level',
        'thumbnail', 'created_by', 'updated_by',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function forms()
    {
        return $this->belongsToMany(Darasa::class, 'class_student', 'student_id', 'class_id')->withPivot('id', 'year');
    }

    public function combination()
    {
        return $this->belongsTo(Combination::class);
    }

    public function addedBy(){
        return $this->belongsTo(User::class , 'created_by');
    }

    public function tabia()
    {
        return $this->belongsToMany(Tabia::class , 'student_tabia', 'student_id', 'tabia_id')
            ->withPivot('id', 'grade', 'term', 'year');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->orderBy('name', 'DESC');
    }
    
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
