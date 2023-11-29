<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'shipment_id',
        'total_price',
        'phone',
        'address',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function billdetail()
    {
        return $this->hasMany(BillDetail::class);
    }

    use HasFactory;
}
