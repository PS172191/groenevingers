<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;

class SalesController extends Controller
{
    public function index()
    {
        // Retrieve total revenue and total orders
        $totalRevenue = OrderDetail::sum('total');
        $totalOrders = OrderDetail::count();

        // Retrieve sales per day, month, and year
        $salesPerDay = $this->getSalesPerPeriod('day');
        $salesPerMonth = $this->getSalesPerPeriod('month');
        $salesPerYear = $this->getSalesPerPeriod('year');

        // Retrieve sales per product
        $salesPerProduct = $this->getSalesPerProduct();

        // Retrieve sales per employee
        $salesPerEmployee = $this->getSalesPerEmployee();

        // Pass data to the view
        return view('management.sales', compact(
            'totalRevenue', 'totalOrders',
            'salesPerDay', 'salesPerMonth', 'salesPerYear',
            'salesPerProduct',
            'salesPerEmployee'
        ));
    }

    private function getSalesPerPeriod($period)
    {
        // Initialize an array to store sales data
        $salesData = [];

        // Retrieve sales data based on the specified period
        if ($period === 'day') {

            $salesData = OrderDetail::selectRaw('DATE(created_at) as date, SUM(total) as total_sales')
                ->groupBy('date')
                ->get();
        } elseif ($period === 'month') {

            $salesData = OrderDetail::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total_sales')
                ->groupBy('year', 'month')
                ->get();
        } elseif ($period === 'year') {

            $salesData = OrderDetail::selectRaw('YEAR(created_at) as year, SUM(total) as total_sales')
                ->groupBy('year')
                ->get();
        }

        return $salesData;
    }

    private function getSalesPerProduct()
    {
        // Retrieve sales per product
        $salesPerProduct = Product::withCount('orders')
            ->orderByDesc('orders_count')
            ->limit(10)
            ->get();

        return $salesPerProduct;
    }

    private function getSalesPerEmployee()
    {
        // Retrieve sales per employee
        $salesPerEmployee = User::withCount('orders')
            ->orderByDesc('orders_count')
            ->limit(10)
            ->get();

        return $salesPerEmployee;
    }
}
