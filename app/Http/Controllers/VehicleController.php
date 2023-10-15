<?php

namespace App\Http\Controllers;

use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicles::with('type')->get();

        return view('admin/vehicles/index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $vehicle = new Vehicles();
        $vehicle->name = $request->name;
        $vehicle->type_id = $request->type_id;
        $vehicle->service_date = $request->service_date;

        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully.');
    }

    public function show($id_vehicle)
    {
        $vehicle = DB::table('vehicles')
            ->join('vehicle_usage_history', 'vehicles.id', '=', 'vehicle_usage_history.vehicle_id')
            ->join('vehicle_type', 'vehicles.type_id', '=', 'vehicle_type.id')
            ->select('vehicle_type.name', 'vehicles.*', 'vehicle_usage_history.*')
            ->where('vehicles.id', '=', $id_vehicle)
            ->first();

        return view('admin.vehicles.detail')->with('vehicle', $vehicle);
    }

    public function update($id_vehicle, Request $request)
    {
        $payload = [
            'name' => $request->input('name'),
            'type_id' => $request->input('type_id'),
            'service_date' => $request->input('service_date'),
        ];

        DB::table('vehicles')->where('id', '=', $id_vehicle)->update($payload);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id_vehicle)
    {
        DB::table('vehicles')->where('id', '=', $id_vehicle)->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
