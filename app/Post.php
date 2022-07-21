<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    protected $guarded = ['id'];

    public function searchableAs()
    {
        return 'posts_index';
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', '=', 1);
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function parentComments()
    {
        return $this->hasMany('App\Comment')->where('parent_id', 0);
    }

    public function allComments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getDateFormattedAttribute($value)
    {
        $date = Carbon::parse($this->date_time);

        $date->locale('ru');

        return $date->isoFormat('D MMMM YYYY', 'Do MMMM');
    }

    public function getBookmarkedAttribute()
    {
        return (Bookmark::where('user_id', Auth::user()->id)->where('post_id', $this->id)->exists()) ? true : false;
    }

    public function getLikedAttribute()
    {
        return (LikeP::where('user_id', Auth::user()->id)->where('post_id', $this->id)->exists()) ? true : false;
    }

    public function getIsHotAttribute()
    {
        $recentCommCount = $this->allComments()->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())->count();

        return ($recentCommCount >= 5) ? true : false;
    }

}
