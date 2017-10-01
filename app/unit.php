<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    protected $table='units';
    protected $fillable=[
        'name',
    ];
    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }
}
