<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Client;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $products = Product::count();

        $clients = Client::count();

        $salesToday = Sale::whereDate('created_at', Carbon::today())->count();

        $monthlySales = Sale::whereMonth('created_at', Carbon::now()->month)->sum('total');

        $outOfStock = Product::where('stock',0)->count();

        $ruptureProducts =Product::where('stock','<=',1)->get();

        $lowStockProducts = Product::where('stock','<=',5)->get();

        return view('dashboard', compact(
            'products',
            'clients',
            'salesToday',
            'monthlySales',
            'outOfStock',
            'ruptureProducts',
            'lowStockProducts'
        ));
    }
}