<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['name' , 'price' , 'details' , 'updated_at' ,'created_at'];
    protected $hidden = ['created_at' , 'updated_at'];
}
