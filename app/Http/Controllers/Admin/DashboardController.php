<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ticket;
use App\Models\events;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = events::count();
        $totalCategories = \App\Models\Category::count();
        $totalOrders = Order::count();

        return view('admin.dashboard', compact('totalCategories', 'totalEvents', 'totalOrders'));
    }
}
