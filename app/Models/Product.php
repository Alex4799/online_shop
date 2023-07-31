<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
        'image1',
        'image2',
        'image3',
        'price',
        'category_id',
        'user_id',
        'hightLighted_info',
        'description',
        'address',
        'type',
        'condition',
        'status'
    ];
}
