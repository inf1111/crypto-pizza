<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $guarded = ['id'];

    public function getDateFormattedAttribute($value)
    {
        $date = Carbon::parse($this->date_time);
        $date->locale('ru');
        return $date->isoFormat('D MMMM YYYY', 'Do MMMM');
    }
}
