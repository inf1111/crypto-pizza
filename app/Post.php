<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements Searchable
{
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function getDateFormattedAttribute($value)
    {
        $date = Carbon::parse($this->date_time);
        $date->locale('ru');
        return $date->isoFormat('D MMMM YYYY', 'Do MMMM');
    }

    public function getSearchResult(): SearchResult
    {
        //dd($this, $this->category->name, $this->slug);

        $url = route('post-show', [$this->category->name, $this->slug]);

        //dd($url);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
