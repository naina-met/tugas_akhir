<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::with('item', 'user')->latest()->paginate(10);
        return view('stock_ins.index', compact('stockIns'));
    }

    public function create()
    {
        $items = Item::all();
        return view('stock_ins.create', compact('items'));
    }

    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'item_id' => 'required|exists:items,id',
        'quantity' => 'required|integer|min:1',
        'incoming_source' => 'required|in:Pembelian,Retur',
        'description' => 'nullable',
    ]);

    // Buat stock in baru
    $stockIn = StockIn::create([
        'date' => $request->date,
        'item_id' => $request->item_id,
        'quantity' => $request->quantity,
        'incoming_source' => $request->incoming_source,
        'description' => $request->description,
        'user_id' => Auth::id(),
    ]);

    // Tambahkan stok pada item terkait
    $item = Item::find($request->item_id);
    $item->stock += $request->quantity;
    $item->save();

    return redirect()->route('stock-ins.index')->with('success', 'Stock in added successfully.');
}


    public function edit(StockIn $stockIn)
    {
        $items = Item::all();
        return view('stock_ins.edit', compact('stockIn', 'items'));
    }

    public function update(Request $request, StockIn $stockIn)
{
    $request->validate([
        'date' => 'required|date',
        'item_id' => 'required|exists:items,id',
        'quantity' => 'required|integer|min:1',
        'incoming_source' => 'required|in:Pembelian,Retur',
        'description' => 'nullable',
    ]);

    // Ambil item lama
    $oldItem = Item::find($stockIn->item_id);
    // Kembalikan stok lama
    $oldItem->stock -= $stockIn->quantity;
    $oldItem->save();

    // Update stockIn
    $stockIn->update($request->all());

    // Ambil item baru (bisa jadi item-nya diganti)
    $newItem = Item::find($request->item_id);
    // Tambahkan stok baru
    $newItem->stock += $request->quantity;
    $newItem->save();

    return redirect()->route('stock-ins.index')->with('success', 'Stock in updated successfully.');
}


    public function destroy(StockIn $stockIn)
{
    // Ambil item yang berkaitan
    $item = Item::find($stockIn->item_id);

    // Kurangi stok item sesuai quantity yang dihapus
    $item->stock -= $stockIn->quantity;
    $item->save();

    // Hapus stock in
    $stockIn->delete();

    return redirect()->route('stock-ins.index')->with('success', 'Stock in deleted successfully.');
}

}
