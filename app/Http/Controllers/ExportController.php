<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockIn;
use App\Models\StockOut;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    // Export untuk Item
    public function exportItems()
    {
        $items = Item::with('category')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Category');
        $sheet->setCellValue('D1', 'Stock');
        $sheet->setCellValue('E1', 'Unit');

        // Isi Data
        $row = 2;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $item->name);
            $sheet->setCellValue('B' . $row, $item->code);
            $sheet->setCellValue('C' . $row, $item->category->name);
            $sheet->setCellValue('D' . $row, $item->stock);
            $sheet->setCellValue('E' . $row, $item->unit);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'items.xlsx';

        // Simpan file sementara
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Download dan hapus setelah terkirim
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    // Export untuk Stock Ins
    public function exportStockIns()
    {
        $stockIns = StockIn::with('item', 'user')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Item');
        $sheet->setCellValue('C1', 'Quantity');
        $sheet->setCellValue('D1', 'Source');
        $sheet->setCellValue('E1', 'User');

        // Isi Data
        $row = 2;
        foreach ($stockIns as $stockIn) {
            $sheet->setCellValue('A' . $row, $stockIn->date);
            $sheet->setCellValue('B' . $row, $stockIn->item->name);
            $sheet->setCellValue('C' . $row, $stockIn->quantity);
            $sheet->setCellValue('D' . $row, $stockIn->incoming_source);
            $sheet->setCellValue('E' . $row, $stockIn->user->username);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'stock_ins.xlsx';

        // Simpan file sementara
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Download dan hapus setelah terkirim
        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    public function exportStockOuts()
{
    $stockOuts = StockOut::with('item', 'user')->get();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set Header
    $sheet->setCellValue('A1', 'Date');
    $sheet->setCellValue('B1', 'Item');
    $sheet->setCellValue('C1', 'Quantity');
    $sheet->setCellValue('D1', 'Destination');
    $sheet->setCellValue('E1', 'User');

    // Isi Data
    $row = 2;
    foreach ($stockOuts as $stockOut) {
        $sheet->setCellValue('A' . $row, $stockOut->date);
        $sheet->setCellValue('B' . $row, $stockOut->item->name);
        $sheet->setCellValue('C' . $row, $stockOut->quantity);
        $sheet->setCellValue('D' . $row, $stockOut->outgoing_destination);
        $sheet->setCellValue('E' . $row, $stockOut->user->username);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'stock_outs.xlsx';

    // Simpan file sementara
    $filePath = storage_path('app/public/' . $fileName);
    $writer->save($filePath);

    // Download dan hapus setelah terkirim
    return response()->download($filePath)->deleteFileAfterSend(true);
}
}
