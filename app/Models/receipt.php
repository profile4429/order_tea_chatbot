<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
   
    use HasFactory;
    protected $table = 'receipt';
    protected $primaryKey = 'id_receipt';
    public $timestamps = false;

    protected $fillable = ['id_receipt,id_user', 'id_item', 'address', 'create_at', 'quantity', 'sum', 'description','status','payment_option'];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function menu()
    {
        return $this->belongsTo(menu::class, 'id_item');
    }
}
