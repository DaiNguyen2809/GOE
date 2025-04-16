<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PackagingOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackagingOrderController extends Controller
{
    public function index()
    {
        $packagingOrders = PackagingOrder::all();
        return view('dream-up.pages.packaging.index', compact('packagingOrders'));
    }

    public function store(Request $request) {
        $packagingOrder = PackagingOrder::create([
            'order_id' => $request->order_id,
            'order_date' => now(),
            'request_staff' => $request->request_staff,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Order::where('id', $request->order_id)->update([
            'status' => 'packaging',
            'updated_at' => now()
        ]);

        return redirect()->route('pk-index')->with('success', 'Yêu cầu đóng gói thành công');
    }

    public function show(PackagingOrder $packagingOrder) {
        $staffRole = 1;

        $orderDetails = DB::table('order_details as od')
            ->leftJoin('products as pd', 'pd.SKU', 'od.product_SKU')
            ->select('od.*', 'pd.image', 'pd.name')->where('od.order_id', $packagingOrder->order_id)->get();

        $request_staff = DB::table('users as us')
           ->select('us.id', 'us.name')->where('us.id', $packagingOrder->request_staff)->first();

        $confirm_staff = DB::table('users as us')
            ->select('us.id', 'us.name')->where('us.id', $packagingOrder->packaging_staff)->first();

        $cancel_staff = DB::table('users as us')
            ->select('us.id', 'us.name')->where('us.id', $packagingOrder->cancel_staff)->first();

        $staffs = DB::table('users as us')
            ->select('us.id', 'us.name')->where('us.role', $staffRole)->get();

        return view('dream-up.pages.packaging.detail', compact(['orderDetails', 'packagingOrder','staffs', 'request_staff', 'confirm_staff', 'cancel_staff']));
    }

    public function cancel(Request $request)
    {
        PackagingOrder::findOrFail($request->id)->update([
            'cancel_date' => now(),
            'updated_at' => now(),
            'status' => 'cancel',
            'cancel_staff' => $request->cancel_staff,
        ]);

        Order::where('id', $request->order_id)->update([
            'status' => 'canceled',
            'updated_at' => now(),
        ]);

        return redirect()->route('pk-index')->with('success', 'Hủy đóng gói thành công');
    }

    public function confirm(Request $request)
    {
        PackagingOrder::findOrFail($request->id)->update([
            'confirm_date' => now(),
            'packaging_staff' => $request->packaging_staff,
            'status' => 'confirm',
            'updated_at' => now()
        ]);

        Order::where('id', $request->order_id)->update([
            'status' => 'packed',
            'updated_at' => now()
        ]);

        return redirect()->route('pk-index')->with('success', 'Xác nhận đóng gói thành công');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $packagingOrders = PackagingOrder::where('id', 'LIKE', "%{$query}%")->orWhere('order_id', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->get();

        return view('dream-up.pages.packaging.table', compact('packagingOrders'));
    }
}
