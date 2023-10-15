<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $table = 'vehicle_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicles::class, 'type_id');
    }
}
