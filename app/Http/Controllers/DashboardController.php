<?php

namespace App\Http\Controllers;

use App\Models\Item; // Pastikan sudah import model Item
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $totalItems = Item::count();
    $lowStockItems = Item::where('stock', '<', 50)->count(); // stok rendah jika < 50
    $outOfStockItems = Item::where('stock', '=', 0)->count(); // stok habis jika = 0

    return view('dashboard', compact('totalItems', 'lowStockItems', 'outOfStockItems'));
}

}
