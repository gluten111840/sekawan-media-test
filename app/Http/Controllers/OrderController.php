<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\VehicleUsageHistory;
use App\Models\DriverUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $order = DB::table('order')
            ->join('order_status', 'order.order_status_id', '=', 'order_status.id')
            ->join('users', 'order.user_id', '=', 'users.id')
            ->join('vehicles', 'order.vehicle_id', '=', 'vehicles.id')
            ->join('driver', 'order.driver_id', '=', 'driver.id')
            ->select('order_status.name as status', 'users.name as user', 'vehicles.name as vehicle', 'driver.name as driver', 'order.*')
            ->get();

        $biggest_id_order = DB::table('order')->max('id');
        $order_status = DB::table('order_status')->get();
        $users = DB::table('users')->where('role_id', '=', 2)->get();
        $vehicles = DB::table('vehicles')->get();
        $driver = DB::table('driver')->get();

        // generate unique no_pesanan with format: NICKEL-YYYYMMDD-XXXX
        $no_pesanan = 'NICKEL-' . date('Ymd') . '-' . sprintf('%04s', $biggest_id_order + 1);

        // dd($no_pesanan);

        return view('admin/order/index')->with('order', $order)->with('order_status', $order_status)->with('users', $users)->with('vehicles', $vehicles)->with('driver', $driver)->with('no_pesanan', $no_pesanan);
    }

    public function detail($id_order) {
        $order = DB::table('order')
            ->join('order_status', 'order.order_status_id', '=', 'order_status.id')
            ->join('users', 'order.user_id', '=', 'users.id')
            ->join('vehicles', 'order.vehicle_id', '=', 'vehicles.id')
            ->join('driver', 'order.driver_id', '=', 'driver.id')
            ->where('order.id', '=', $id_order)
            ->select(
                'order_status.name as status', 
                'users.name as user', 
                'vehicles.name as vehicle', 
                'driver.name as driver', 
                'order.*')
            ->first();

        return view('admin/order/detail')->with('order', $order);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->no_pesanan = $request->no_pesanan;
        $order->driver_id = $request->driver;
        $order->vehicle_id = $request->vehicle;
        $order->user_id = $request->user;
        $order->order_status_id = $request->order_status_id;
        $order->description = $request->description;
        $order->start_date = $request->start_date;
        $order->end_date = $request->end_date;

        $vehicle_usage_history = new VehicleUsageHistory();
        $vehicle_usage_history->vehicle_id = $request->vehicle;
        $vehicle_usage_history->start_date = $request->start_date;
        $vehicle_usage_history->end_date = $request->end_date;

        $driver_usage = new DriverUsage();
        $driver_usage->driver_id = $request->driver;
        $driver_usage->start_date = $request->start_date;
        $driver_usage->end_date = $request->end_date;
        // dd($order->order_status_id);

        $order->save();
        $vehicle_usage_history->save();
        $driver_usage->save();

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    public function edit($id_order) {
        $order = DB::table('order')
            ->join('order_status', 'order.order_status_id', '=', 'order_status.id')
            ->join('users', 'order.user_id', '=', 'users.id')
            ->join('vehicles', 'order.vehicle_id', '=', 'vehicles.id')
            ->join('driver', 'order.driver_id', '=', 'driver.id')
            ->where('order.id', '=', $id_order)
            ->select(
                'order_status.name as status',
                'order_status.id as status_id', 
                'users.name as user', 
                'vehicles.name as vehicle', 
                'driver.name as driver', 
                'order.*')
            ->first();

        return view('admin/order/update')->with('order', $order);
    }

    public function update($id_order, Request $request)
    {
        $order = Order::find($id_order);

        $order->order_status_id = $request->status;
        $order->update();

        return redirect()->route('order.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id_order)
    {
        DB::table('order')->where('id', '=', $id_order)->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }

    public function checkVehicleAvailability(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $vehicle_id = $request->vehicle_id;

        $vehicle_usage_history = DB::table('vehicle_usage_history')
            ->where('vehicle_id', '=', $vehicle_id)
            ->where('start_date', '<=', $start_date)
            ->where('end_date', '>=', $end_date)
            ->get();

        if (count($vehicle_usage_history) > 0) {
            return response()->json([
                'status' => 'unavailable',
                'message' => 'Kendaraan tidak tersedia pada tanggal tersebut.',
                'data' => $vehicle_usage_history
            ]);
        } else {
            return response()->json([
                'status' => 'available',
                'message' => 'Kendaraan tersedia pada tanggal tersebut.'
            ]);
        }
    }

    public function checkDriverAvailability(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $driver_id = $request->driver_id;

        $driver_usage = DB::table('driver_usage')
            ->where('driver_id', '=', $driver_id)
            ->where('start_date', '<=', $start_date)
            ->where('end_date', '>=', $end_date)
            ->get();

        if (count($driver_usage) > 0) {
            return response()->json([
                'status' => 'unavailable',
                'message' => 'Driver tidak tersedia pada tanggal tersebut.'
            ]);
        } else {
            return response()->json([
                'status' => 'available',
                'message' => 'Driver tersedia pada tanggal tersebut.'
            ]);
        }
    }
}
