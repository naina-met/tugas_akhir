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

        $stockOut->update($request->all());

        return redirect()->route('stock-outs.index')->with('success', 'Stock out updated successfully.');
    }

    public function destroy(StockOut $stockOut)
    {
        $stockOut->delete();
        return redirect()->route('stock-outs.index')->with('success', 'Stock out deleted successfully.');
    }
}
