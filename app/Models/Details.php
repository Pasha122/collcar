<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
     /**
     * @var string $table
     */
    protected $table = 'details';
    public $timestamps = true;
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'car_brand_id',
        'car_brand',
        'user_id',
        'art',
        'price',
        
        
    ];
    use HasFactory;
}
