<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * @var string $table
     */
    protected $table = 'orders';
    public $timestamps = true;
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'list',
        'price',
        'user_id',
        'client_id',
        'client_name',
        
        
    ];
    use HasFactory;
}

