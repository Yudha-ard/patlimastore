<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use mpdf\Mpdf;

class PDFController extends Controller
{
    public function ExportPDF($year)
    {
        $products = Product::whereYear('tanggal', $year)->get();

        $data = [
            'title' => "Laporan Data Penjualan Patlima Store $year",
            'products' => $products
        ];

        $pdf = Pdf::loadView('pdf.document', $data);
        return $pdf->download("PatlimaStore_$year.pdf");
    }
}
