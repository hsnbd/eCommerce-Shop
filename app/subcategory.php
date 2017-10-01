<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table='subcategories';
    protected $fillable=[
        'name','categoriesid',
    ];
    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }
}
