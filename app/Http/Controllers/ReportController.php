<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportProducts;
use DB;
use Auth;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use NumberFormatter;
use Carbon\Carbon;

class reportController extends Controller
{
    function export_excel($year)
    {
        return Excel::download(new ExportProducts($year), "PatlimaStore_{$year}.xlsx");
    }
    // function view_pdf()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $mpdf->WriteHTML('<h1>Hello world!</h1>');
    //     $mpdf->Output();
    // }
    public function getProductData()
    {
        $years = Product::selectRaw('YEAR(tanggal) as year')
                        ->groupBy('year')
                        ->orderBy('year', 'desc')
                        ->get();

        $data = $years->map(function($year) {
            $yearValue = $year->year;
            $productsSold = Product::whereYear('tanggal', $yearValue)->count();
            $totalIncome = Product::whereYear('tanggal', $yearValue)->sum('keuntungan');
            $latestMonth = Product::whereYear('tanggal', $yearValue)->max('tanggal');
            $currentMonth = Carbon::now()->month;

            return [
                'year' => $yearValue,
                'products_sold' => $productsSold,
                'total_income' => $totalIncome,
                'status' => Carbon::parse($latestMonth)->year == $yearValue && Carbon::parse($latestMonth)->month == 12 ? 'done' : 'progress',
                'progress' => Carbon::parse($latestMonth)->month ?? $currentMonth
            ];
        });

        return view('report', ['data' => $data]);
    }
    public function getRevenueData(Request $request)
    {
        $year = $request->input('year');

        // Query untuk mengambil total revenue perbulan dari harga_jual
        $monthlyRevenue = Product::selectRaw('MONTH(tanggal) as month, SUM(harga_jual) as total_revenue')
                                 ->whereYear('tanggal', $year)
                                 ->groupByRaw('MONTH(tanggal)')
                                 ->orderBy('month')
                                 ->get();

        // Query untuk mengambil total revenue pertahun dari harga_jual
        $yearlyRevenue = Product::selectRaw('YEAR(tanggal) as year, SUM(harga_jual) as total_revenue')
                                ->groupByRaw('YEAR(tanggal)')
                                ->orderBy('year')
                                ->get();

        return response()->json([
            'monthlyRevenue' => $monthlyRevenue, // Corrected key name
            'yearlyRevenue' => $yearlyRevenue
        ]);
    }
    public function getIncomeData(Request $request)
    {
        $year = $request->input('year');

        // Query untuk mengambil total revenue perbulan dari harga_jual
        $monthlyIncome = Product::selectRaw('MONTH(tanggal) as month, SUM(keuntungan) as total_income')
                                 ->whereYear('tanggal', $year)
                                 ->groupByRaw('MONTH(tanggal)')
                                 ->orderBy('month')
                                 ->get();

        // Query untuk mengambil total revenue pertahun dari harga_jual
        $yearlyIncome = Product::selectRaw('YEAR(tanggal) as year, SUM(keuntungan) as total_income')
                                ->groupByRaw('YEAR(tanggal)')
                                ->orderBy('year')
                                ->get();

        return response()->json([
            'monthlyIncome' => $monthlyIncome, // Corrected key name
            'yearlyIncome' => $yearlyIncome
        ]);
    }
}
