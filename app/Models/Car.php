<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'car';
    public $timestamps = false;
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
  
        
    ];
    use HasFactory;
}
