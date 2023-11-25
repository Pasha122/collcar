<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'category';
    public $timestamps = false;
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',     
    ];
    use HasFactory;
}
