<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     /**
     * @var string $table
     */
    protected $table = 'clients';
    public $timestamps = true;
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'user_id',
        
        
        
    ];
    use HasFactory;
}
