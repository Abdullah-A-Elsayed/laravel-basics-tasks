<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','contenent_id'];
    public function contenent()
    {
        return $this->belongsTo("App\contenent");
    }
     public function cities()
    {
        return $this->hasMany("App\City");
    }
}
