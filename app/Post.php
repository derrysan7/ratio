<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function user() // $post->user, $comment->post->user
	{
		return $this->belongsTo(User::class);
	}

	public function addComment($body)
	{
		$user_id = auth()->id();
		$this->comments()->create(compact('user_id','body'));

		// $this->comments()->create(['body' => $body])

		// Comment::create([
		// 	'body' => $body,
		// 	'post_id' => $this->id
  //   	]);
	}

	public function scopeFilter($query, $filters)
	{
		if ($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month); //March => 3, May => 5
		}

		if ($year = $filters['year']) {
			$query->whereYear('created_at', $year);
		}
	}

	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
			->groupBy('year', 'month')
			->orderByRaw('min(created_at) desc')
			->get()
			->toArray();
	}
}
