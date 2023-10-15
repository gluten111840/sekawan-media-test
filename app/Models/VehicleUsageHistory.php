<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleUsageHistory extends Model
{
    use HasFactory;

    protected $table = 'vehicle_usage_history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'start_date',
        'end_date',
        'usage_description',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id');
    }
}
