<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockOutController extends Controller
{
    public function index()
    {
        $stockOuts = StockOut::with('item', 'user')->latest()->paginate(10);
        return view('stock_outs.index', compact('stockOuts'));
    }

    public function create()
    {
        $items = Item::all();
        return view('stock_outs.create', compact('items'));
    }

    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'item_id' => 'required|exists:items,id',
        'quantity' => 'required|integer|min:1',
        'outgoing_destination' => 'required|in:Penjualan,Pemakaian internal,Rusak',
        'description' => 'nullable',
    ]);

    $item = Item::find($request->item_id);

    // Cek apakah stok cukup
    if ($request->quantity > $item->stock) {
        return back()->withErrors(['quantity' => 'Stok tidak mencukupi. Sisa stok: ' . $item->stock])->withInput();
    }

    // Kurangi stok
    $item->stock -= $request->quantity;
    $item->save();

    StockOut::create([
        'date' => $request->date,
        'item_id' => $request->item_id,
        'quantity' => $request->quantity,
        'outgoing_destination' => $request->outgoing_destination,
        'description' => $request->description,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('stock-outs.index')->with('success', 'Stock out recorded successfully.');
}

    public function edit(StockOut $stockOut)
    {
        $items = Item::all();
        return view('stock_outs.edit', compact('stockOut', 'items'));
    }

    public function update(Request $request, StockOut $stockOut)
{
    $request->validate([
        'date' => 'required|date',
        'item_id' => 'required|exists:items,id',
        'quantity' => 'required|integer|min:1',
        'outgoing_destination' => 'required|in:Penjualan,Pemakaian internal,Rusak',
        'description' => 'nullable',
    ]);

    $oldItem = Item::find($stockOut->item_id);
    $newItem = Item::find($request->item_id);

    // Kembalikan stok lama
    $oldItem->stock += $stockOut->quantity;
    $oldItem->save();

    // Cek apakah stok cukup untuk item baru
    if ($request->quantity > $newItem->stock) {
        return back()->withErrors(['quantity' => 'Stok tidak mencukupi. Sisa stok: ' . $newItem->stock])->withInput();
    }

    // Kurangi stok item baru
    $newItem->stock -= $request->quantity;
    $newItem->save();

    // Update stock out
    $stockOut->update([
        'date' => $request->date,
        'item_id' => $request->item_id,
        'quantity' => $request->quantity,
        'outgoing_destination' => $request->outgoing_destination,
        'description' => $request->description,
    ]);

    return redirect()->route('stock-outs.index')->with('success', 'Stock out updated successfully.');
}


    public function destroy(StockOut $stockOut)
{
    $item = Item::find($stockOut->item_id);

    // Tambahkan kembali stok
    $item->stock += $stockOut->quantity;
    $item->save();

    // Hapus stock out
    $stockOut->delete();

    return redirect()->route('stock-outs.index')->with('success', 'Stock out deleted successfully.');
}

}
