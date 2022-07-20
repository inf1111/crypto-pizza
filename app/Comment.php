<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /*public function getDateFormattedAttribute($value)
    {
        $date = Carbon::parse($this->created_at);
        $date->locale('ru');
        return $date->isoFormat('D MMMM YYYY', 'Do MMMM');
    }*/

}
