<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportProducts implements FromView, WithEvents, ShouldAutoSize
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function view(): View
    {
        // Query to retrieve products grouped by month for the specified year
        $products = Product::whereYear('tanggal', $this->year)
                           ->orderBy('tanggal', 'asc')
                           ->get()
                           ->groupBy(function($date) {
                               return date('m', strtotime($date->tanggal));
                           });

        // Calculate total profit per month and annual profit
        $totalProfits = [];
        $annualProfit = 0;
        foreach ($products as $month => $productsPerMonth) {
            $totalProfit = $productsPerMonth->sum('keuntungan');
            $totalProfits[$month] = $totalProfit;
            $annualProfit += $totalProfit; // Accumulate total annual profit
        }

        return view('table', [
            'products' => $products,
            'totalProfits' => $totalProfits,
            'annualProfit' => $annualProfit,
            'year' => $this->year, // Pass the year variable to the view
        ]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Apply background color to specific columns in Excel
                $styleArray = [
                    'font' => ['bold' => true],
                    'fill' => ['fillType' => 'fill', 'startColor' => ['rgb' => 'AED6F1']]
                ];

                // Apply the style to columns B to H (Nama Barang to Transaksi)
                $event->sheet->getStyle('B1:H1')->applyFromArray($styleArray);
                $event->sheet->getStyle('B2:H' . ($event->sheet->getHighestRow()))->applyFromArray($styleArray);
            },
        ];
    }
}
