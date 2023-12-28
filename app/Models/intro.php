<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intro extends Model
{
    use HasFactory;

    protected $table = 'intros';

    protected $fillable = ['title', 'image', 'desc', 'status'];
}
