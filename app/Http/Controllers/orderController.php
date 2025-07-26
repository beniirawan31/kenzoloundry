<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with('success', 'Order berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return response()->json(['message' => 'Status berhasil diperbarui.']);
    }

    public function getOrder($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }
    
}
