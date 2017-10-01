<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='products';
    protected $fillable=[
        'title','description','discount','subcategoriesid','size','price','vat','stock','weight','unitsid','picture1','picture2','picture3','default_picture',
    ];
}
