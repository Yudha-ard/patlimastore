<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showDashboard(Request $request)
    {
        $totalProducts = (new ProductController())->getTotalProducts();
        $totalRevenue = (new ProductController())->getTotalRevenue();
        $totalIncome = (new ProductController())->getTotalIncome();
        $fashionCount = (new ProductController())->getTotalProductsFashion();
        $gadgetCount = (new ProductController())->getTotalProductsGadget();
        $topProducts = (new ProductController())->getTopProducts();

        $widget = [
            'product' => $totalProducts,
            'revenue' => $totalRevenue,
            'income' => $totalIncome,
            'fashion' => $fashionCount,
            'gadget' => $gadgetCount,
            'topProducts' => $topProducts,
            //...
        ];

        return view('dashboard' , compact('widget'));
    }
}


