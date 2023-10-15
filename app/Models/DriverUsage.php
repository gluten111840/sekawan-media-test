<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverUsage extends Model
{
    use HasFactory;

    protected $table = 'driver_usage';

    protected $primaryKey = 'id';

    protected $fillable = [
        'driver_id',
        'start_date',
        'end_date',
    ];
}
