<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table="countries";
    protected $fillable=['name'];
    public function setNameAttribute($value){
        $this->attributes['name']= ucfirst($value);
    }
}
