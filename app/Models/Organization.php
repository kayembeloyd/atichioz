<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
	* Get jobs for the organization 
	*/
	public function jobs()
	{
		return $this->hasMany(Job::class);
	}

	/**
	* Get the categories for this job
	*/
	public function categories(){
		return $this->morphToMany(Category::class, 'categorizable');
	}
}
