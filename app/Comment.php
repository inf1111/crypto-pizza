<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /*public function getDateFormattedAttribute($value)
    {
        $date = Carbon::parse($this->created_at);
        $date->locale('ru');
        return $date->isoFormat('D MMMM YYYY', 'Do MMMM');
    }*/

}
