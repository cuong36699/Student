<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $fillable = [
		'department_name',
		'degree',
		'graduation_year',
	];

	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
