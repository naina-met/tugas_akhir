<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $lowStockItems = Item::where('stock', '<', 50)->count();
        $outOfStockItems = Item::where('stock', '=', 0)->count();

        $lowStockItemDetails = Item::where('stock', '<', 50)
            ->get(['name', 'stock']);

        // Ambil 7 hari terakhir (dari 6 hari lalu sampai hari ini)
        $dates = collect(range(6, 0))->map(function ($i) {
            return Carbon::now()->subDays($i)->toDateString();
        })->values(); // 🔧 Tambahkan values() agar jadi array numerik

        // Ambil jumlah barang masuk per tanggal
        $stockInCounts = $dates->map(function ($date) {
            return (int) DB::table('stock_ins')->whereDate('date', $date)->sum('quantity');
        })->values(); // 🔧 Ubah ke array numerik dan pastikan hasil integer

        // Ambil jumlah barang keluar per tanggal
        $stockOutCounts = $dates->map(function ($date) {
            return (int) DB::table('stock_outs')->whereDate('date', $date)->sum('quantity');
        })->values(); // 🔧 Ubah ke array numerik dan pastikan hasil integer

        return view('dashboard', compact(
            'totalItems',
            'lowStockItems',
            'outOfStockItems',
            'lowStockItemDetails',
            'dates',
            'stockInCounts',
            'stockOutCounts'
        ));
    }
}
