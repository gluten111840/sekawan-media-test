<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'type_id',
        'service_date',
    ];

    public function type()
    {
        return $this->belongsTo(VehicleType::class, 'type_id');
    }

    public function history()
    {
        return $this->hasMany(VehicleUsageHistory::class, 'vehicle_id');
    }
}
