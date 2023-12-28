<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = ['category_id', 'title', 'price', 'image', 'desc', 'created_at', 'updated_at', 'deleted'];

    // Relationship với bảng "category"
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    // Relationship với bảng "orderDetail"
    public function order_detail()
    {
        return $this->hasMany(order_detail::class, 'product_id');
    }
}
