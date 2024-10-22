<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'description',
        'price',
        'image',
        'cat',
    ];

    public $timestamps = false;

    public function galleries()
   {
       return $this->hasMany(ProductGallary::class , 'product_id');
   }

}
