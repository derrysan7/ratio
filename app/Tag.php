<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
	{
		return $this->belongsToMany(Post::class);
	}

	//nama function harus getRouteKeyName default dari laravel untuk overwite id di url
	public function getRouteKeyName()
	{
		return 'name';
	}	
}
