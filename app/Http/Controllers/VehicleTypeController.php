<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $vehicleTypes = VehicleType::all();

        return view('admin/vehicleTypes/index', compact('vehicleTypes'));
    }

    public function create()
    {
        return view('admin/vehicleTypes/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        VehicleType::create($request->all());

        return redirect()->route('vehicleTypes.index')->with('success', 'Vehicle type created successfully.');
    }

    public function show(VehicleType $vehicleType)
    {
        return view('admin/vehicleTypes/show', compact('vehicleType'));
    }

    public function edit(VehicleType $vehicleType)
    {
        return view('admin/vehicleTypes/edit', compact('vehicleType'));
    }

    public function update(Request $request, VehicleType $vehicleType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $vehicleType->update($request->all());

        return redirect()->route('vehicleTypes.index')->with('success', 'Vehicle type updated successfully.');
    }

    public function destroy(VehicleType $vehicleType)
    {
        $vehicleType->delete();

        return redirect()->route('vehicleTypes.index')->with('success', 'Vehicle type deleted successfully.');
    }
}
