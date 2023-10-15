<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'no_pesanan',
        'driver_id',
        'vehicle_id',
        'user_id',
        'order_status_id',
        'description',
        'start_date',
        'end_date',
    ];
}
