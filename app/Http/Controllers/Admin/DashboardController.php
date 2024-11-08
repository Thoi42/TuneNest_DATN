<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $countOrder = Order::count();
        $totalOrder = Order::sum('total');
        $countPending = Order::where('status', 'chờ duyệt')->count();
        $totalPending = Order::where('status', 'chờ duyệt')->sum('total');
        $countDelivered = Order::where('status', 'đã giao')->count();
        $totalDelivered = Order::where('status', 'đã giao')->sum('total');
        $countCanceled = Order::where('status', 'đã hủy')->count();
        $totalCanceled = Order::where('status', 'đã hủy')->sum('total');    
        $orders = Order::with(['customer', 'orderDetails'])->orderBy('created_at', 'desc')->paginate(5);
        
        $monthlyRevenue = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->pluck('total', 'month');
        $monthlyPending = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->where('status', 'chờ duyệt')
            ->groupBy('month')
            ->pluck('total', 'month');
        $monthlyDelivered = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->where('status', 'đã giao')
            ->groupBy('month')
            ->pluck('total', 'month');
        $monthlyCanceled = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->where('status', 'đã hủy')
            ->groupBy('month')
            ->pluck('total', 'month');
        return view('admin.dashboard.index', compact('countOrder', 'totalOrder', 'countPending', 'totalPending', 'countDelivered', 'totalDelivered', 'countCanceled', 'totalCanceled', 'orders', 'monthlyRevenue', 'monthlyPending', 'monthlyDelivered', 'monthlyCanceled'));
    }
}
