<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    protected $fillable = [
        'date',
        'sales',
        'total_order',
    ];

    use HasFactory;
}
