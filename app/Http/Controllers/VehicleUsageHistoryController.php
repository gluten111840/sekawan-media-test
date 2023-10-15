<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleUsageHistory;

class VehicleUsageHistoryController extends Controller
{
    public function index()
    {
        $vehicleUsageHistory = VehicleUsageHistory::with('vehicle')->get();

        return view('admin/vehicleUsageHistory/index', compact('vehicleUsageHistory'));
    }

    public function create()
    {
        return view('admin/vehicleUsageHistory/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'fuel_consumption' => 'required',
            'usage_description' => 'required',
        ]);

        VehicleUsageHistory::create($request->all());

        return redirect()->route('vehicleUsageHistory.index')->with('success', 'Vehicle usage history created successfully.');
    }

    public function show(VehicleUsageHistory $vehicleUsageHistory)
    {
        return view('admin/vehicleUsageHistory/show', compact('vehicleUsageHistory'));
    }

    public function edit(VehicleUsageHistory $vehicleUsageHistory)
    {
        return view('admin/vehicleUsageHistory/edit', compact('vehicleUsageHistory'));
    }

    public function update(Request $request, VehicleUsageHistory $vehicleUsageHistory)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'fuel_consumption' => 'required',
            'usage_description' => 'required',
        ]);

        $vehicleUsageHistory->update($request->all());

        return redirect()->route('vehicleUsageHistory.index')->with('success', 'Vehicle usage history updated successfully.');
    }

    public function destroy(VehicleUsageHistory $vehicleUsageHistory)
    {
        $vehicleUsageHistory->delete();

        return redirect()->route('vehicleUsageHistory.index')->with('success', 'Vehicle usage history deleted successfully.');
    }
}
