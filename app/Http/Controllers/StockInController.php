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

        StockIn::create([
            'date' => $request->date,
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'incoming_source' => $request->incoming_source,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

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

        $stockIn->update($request->all());

        return redirect()->route('stock-ins.index')->with('success', 'Stock in updated successfully.');
    }

    public function destroy(StockIn $stockIn)
    {
        $stockIn->delete();
        return redirect()->route('stock-ins.index')->with('success', 'Stock in deleted successfully.');
    }
}
