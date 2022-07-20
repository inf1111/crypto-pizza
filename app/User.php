<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookmarkedPosts() {

        return $this->belongsToMany('App\Post', 'bookmarks', 'user_id', 'post_id')->orderBy('date_time','desc'); //таблицу следовало назвать не bookmarks, а user_posts

    }

    public function likedPosts() {

        return $this->belongsToMany('App\Post', 'likesp', 'user_id', 'post_id')->orderBy('date_time','desc'); //таблицу следовало назвать не likesp, а user_posts

    }

    public function getSubscribedAttribute() {

        return (Subscriber::where('email', $this->email)->exists()) ? true : false;

    }

    public function getNameForCommentsAttribute() {

        return ($this->name === null) ? "Анонимный пользователь" : $this->name;

    }

    public function checkIn() {

        $this->last_vistit_at = now();
        $this->save();

    }

    public function getIsOnlineAttribute() {

        $last_vistit_at = Carbon::parse($this->last_vistit_at);
        $tenMinutesAgo = Carbon::now()->subMinutes(10);

        return ($last_vistit_at->gte($tenMinutesAgo)) ? true : false;

    }

}
