<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Driver::get();

        return view('admin/driver/index', compact('driver'));
    }

    public function store(Request $request)
    {
        $driver = new Driver();
        $driver->name = $request->name;
        $driver->age = $request->age;

        $driver->save();

        return redirect()->route('driver.index')->with('success', 'Driver created successfully.');
    }

    public function destroy($id_driver)
    {
        DB::table('driver')->where('id', '=', $id_driver)->delete();

        return redirect()->route('driver.index')->with('success', 'Vehicle deleted successfully.');
    }

    public function detailEdit($id_driver)
    {
        $driver = Driver::find($id_driver);

        return view('admin/driver/update', compact('driver'))->with('driver', $driver);
    }

    public function update($id_driver, Request $request)
    {
        $driver = Driver::find($id_driver);
        $driver->name = $request->name;
        $driver->age = $request->age;

        $driver->save();

        return redirect()->route('driver.index')->with('success', 'Driver updated successfully.');
    }
}
