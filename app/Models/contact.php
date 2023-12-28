<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'fullname',
        'address',
        'phone',
        'email',
        'facebook',
        'zalo',
        'bank_name',
        'bank_number',
        'bank_address',
        'desc',
    ];
}
