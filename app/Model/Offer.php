<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name_en', 'name_ar' , 'price' , 'details_en' , 'details_ar' , 'updated_at' ,'created_at'];
    protected $hidden = ['created_at' , 'updated_at'];
}
