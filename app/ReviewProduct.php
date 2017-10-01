<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewProduct extends Model
{
    protected $table='review_products';
    protected $fillable=['product_id','users_id','user_name','message','users_email',];
}
