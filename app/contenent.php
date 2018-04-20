<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contenent extends Model
{
    protected $fillable = ['name'];
    public function countries()
    {
        return $this->hasMany("App\Country");
    }
    public function cities()
    {
        return $this->hasManyThrough("App\City","App\Country");
    }
}
