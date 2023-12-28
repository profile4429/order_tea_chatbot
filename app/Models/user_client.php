<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_client extends Model
{
    use HasFactory;
    protected $table = 'user_client';
    protected $fillable = ['fullname', 'email', 'phone_number', 'address', 'created_at', 'updated_at', 'deleted'];

    // Relationship với bảng "order"    
    public function order()
    {
        return $this->hasMany(order::class, 'user_id');
    }
}
