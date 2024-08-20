<?php

namespace App\Http\Controllers;

use NumberFormatter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function getTotalProducts()
    {
        $totalProducts = Product::count(); // Hitung total produk dalam database
        return $totalProducts;
    }
    public function getTopProducts()
    {
        $topProducts = Product::orderBy('keuntungan', 'desc')
            ->limit(5)
            ->get();
        return $topProducts;
    }
    public function getTotalProductsFashion()
    {
        $fashionCount = Product::where('category', 'fashion')->count();// Menghitung jumlah produk untuk kategori 'fashion'
        return $fashionCount;
    }
    public function getTotalProductsGadget()
    {
        $gadgetCount = Product::where('category', 'gadget')->count();// Menghitung jumlah produk untuk kategori 'fashion'
        return $gadgetCount;
    }
    public function getTotalRevenue()
    {
        $totalRevenue = Product::sum('harga_jual');
        $formattedRevenue = 'Rp ' . number_format($totalRevenue, 0, ',', '.');
        return $formattedRevenue;
    }
    public function getProductDataByCategoryAndYear(Request $request)
    {
        $year = $request->input('year');

        $categories = ['fashion', 'gadget']; // Kategori yang tersedia

        $data = [];

        foreach ($categories as $category) {
            // Query untuk mengambil total produk per bulan per kategori
            $monthlyData = Product::selectRaw('MONTH(tanggal) as month, COUNT(*) as total')
                ->where('category', $category)
                ->whereYear('tanggal', $year)
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total', 'month')
                ->toArray();

            // Isi data dengan 0 jika tidak ada data untuk suatu bulan
            $monthlyData = array_replace(array_fill(1, 12, 0), $monthlyData);
            ksort($monthlyData); // Urutkan data berdasarkan bulan

            $data[$category] = array_values($monthlyData);
        }

        return response()->json(['monthlyProductData' => $data]);
    }
    public function getRevenueByYearRevenue(Request $request)
    {
        $year = $request->input('year');

        // Ambil pendapatan bulanan dari database
        $monthlyRevenue = Product::select(
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('SUM(harga_jual) as total')
        )
            ->whereYear('tanggal', $year)
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->pluck('total', 'month');

        $formattedMonthlyRevenue = [];
        $totalYearlyRevenue = 0;

        // Format pendapatan bulanan dan hitung total tahunan
        for ($i = 1; $i <= 12; $i++) {
            $monthlyTotal = $monthlyRevenue->get($i, 0);
            $formattedMonthlyRevenue[] = [
                'month' => $i,
                'revenue' => 'Rp ' . number_format($monthlyTotal, 0, ',', '.')
            ];
            $totalYearlyRevenue += $monthlyTotal;
        }

        // Format total pendapatan tahunan
        $formattedYearlyRevenue = 'Rp ' . number_format($totalYearlyRevenue, 0, ',', '.');

        // Kembalikan respons JSON dengan pendapatan bulanan dan total tahunan
        return response()->json([
            'monthlyRevenue' => $formattedMonthlyRevenue,
            'totalYearlyRevenue' => $formattedYearlyRevenue
        ]);
    }
    public function getRevenueByYearIncome(Request $request)
    {
        $year = $request->input('year');

        // Ambil pendapatan bulanan dari database
        $monthlyIncome = Product::select(
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('SUM(keuntungan) as total')
        )
            ->whereYear('tanggal', $year)
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->pluck('total', 'month');

        $formattedMonthlyIncome = [];
        $totalYearlyIncome = 0;

        // Format pendapatan bulanan dan hitung total tahunan
        for ($i = 1; $i <= 12; $i++) {
            $monthlyTotal = $monthlyIncome->get($i, 0);
            $formattedMonthlyIncome[] = [
                'month' => $i,
                'income' => 'Rp ' . number_format($monthlyTotal, 0, ',', '.')
            ];
            $totalYearlyIncome += $monthlyTotal;
        }

        // Format total pendapatan tahunan
        $formattedYearlyIncome = 'Rp ' . number_format($totalYearlyIncome, 0, ',', '.');

        // Kembalikan respons JSON dengan pendapatan bulanan dan total tahunan
        return response()->json([
            'monthlyIncome' => $formattedMonthlyIncome,
            'totalYearlyIncome' => $formattedYearlyIncome
        ]);
    }
    public function getTotalIncome()
    {
        $totalIncome = Product::sum('keuntungan'); // Hitung total harga_beli dalam database
        $formattedIncome = 'Rp ' . number_format($totalIncome, 0, ',', '.');
        return $formattedIncome;
    }
    public function create()
    {
        return view('addproduct');
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->nama_barang = $request->nama_barang;
        $product->tanggal = $request->tanggal;
        $product->harga_beli = $request->harga_beli;
        $product->harga_jual = $request->harga_jual;
        // $product->keuntungan = $request->keuntungan;
        $product->category = $request->category;
        $product->kondisi = $request->kondisi;
        $product->transaksi_status = $request->transaksi_status;
        $product->save();

        return response()->json(['success' => 'Data updated successfully']);
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
    public function store(Request $request)
    {

        $hargaBeli = str_replace('.', '', $request->harga_beli);
        $hargaJual = str_replace('.', '', $request->harga_jual);

        Product::create([
            'user_id' => auth()->user()->id,
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaJual,
            'tanggal' => $request->tanggal,
            'kondisi' => $request->kondisi,
            'category' => $request->category,
            'transaksi_status' => $request->transaksi_status,
        ]);

        return redirect('product');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return redirect()->route('product', )->with('success', 'Product deleted successfully');
    }
}

