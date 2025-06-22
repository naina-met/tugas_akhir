<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $lowStockItems = Item::where('stock', '<', 50)->count();
        $outOfStockItems = Item::where('stock', '=', 0)->count();

        // Ambil item yang stoknya < 50, ambil nama dan stock-nya
        $lowStockItemDetails = Item::where('stock', '<', 50)
            ->get(['name', 'stock']);

        return view('dashboard', compact('totalItems', 'lowStockItems', 'outOfStockItems', 'lowStockItemDetails'));
    }
}
