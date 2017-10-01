<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table='size';
    protected $fillable=['name'];
    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }
}
