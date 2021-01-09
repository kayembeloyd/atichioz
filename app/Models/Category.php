<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    /*
	* Get all of the jobs that are assigned to this category
	*/
	public function jobs()
	{
		return $this->morphedByMany(Job::class, 'categorizable');
	}

	/*
	* Get all of the organizations that are assigned to this category
	*/
	public function organizations()
	{
		return $this->morphedByMany(Organization::class, 'categorizable');
	}
}
