<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Admin extends Model
{
    use HasFactory;
    protected $table = 'user_admin';
    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
}
