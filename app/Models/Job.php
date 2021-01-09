<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
	* Get requirements for the Job 
	*/
	public function requirements(){
		return $this->hasMany(Requirement::class);
	}


	/**
	* Get the organization that owns the job 
	*/
	public function organization(){
		return $this->belongsTo(Organization::class)->withDefault();
	}


	/**
	* Get the categories for this job
	*/
	public function categories(){
		return $this->morphToMany(Category::class, 'categorizable');
	}
}
