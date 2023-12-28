<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable = ['id', 'item_name', 'price', 'description', 'image',];

   
}
