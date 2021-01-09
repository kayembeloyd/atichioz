<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
	* Get the Job that owns the requirement 
	*/
	public function job(){
		return $this->belongsTo(Job::class)->withDefault();
	}
}
