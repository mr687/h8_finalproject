<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Invoice::all();
        $newOrders = $orders->where('status', 'pending')->count();
        $processedOrders = $orders->where('status', 'process')->count();
        $shippedOrders = $orders->where('status', 'deliver')->count();
        $doneOrders = $orders->where('status', 'done')->count();

        return view('admin.dashboard')
            ->withTotalProfit($orders->where('status', 'done')->sum('total'))
            ->withTotalCategories(Category::count())
            ->withTotalProducts(Product::count())
            ->withTotalCustomers(Customer::count())
            ->withTotalOrder([
                'new' => $newOrders,
                'processed' => $processedOrders,
                'shipped' => $shippedOrders,
                'done' => $doneOrders
            ]);
    }
}
