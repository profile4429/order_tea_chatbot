<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table ='order_detail';

    protected $fillable = ['order_id', 'product_id', 'count', 'price', 'total_money'];

    // Relationship với bảng "order"
    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    }

    // Relationship với bảng "product"
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
