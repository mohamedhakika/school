<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'assessID', 'name', 'created_by', 'updated_by',
    ];

    public function addedBy()
    {
    	return $this->belongsTo('App\User', 'created_by');	
    }
    
    public function updatedBy()
    {
    	return $this->belongsTo('App\User', 'updated_by');
    }
}
