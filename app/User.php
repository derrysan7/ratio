<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        //[1]reference relationship
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        //save the existing model that you have (di dalam metode posts() sudah di [1]reference relationshipnya, dan di postsController sudah ada [2]existing instance, jadi tidak perlu pakai create
        $this->posts()->save($post);

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     //'user_id' => auth()->user()->id
        //     'user_id' => auth()->id()
        // ]);
    }
}
