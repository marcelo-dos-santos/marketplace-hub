<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with(['store', 'category', 'images'])
            ->where('is_featured', true)
            ->where('status', 'published')
            ->where('is_active', true)
            ->inStock()
            ->latest()
            ->take(8)
            ->get();

        $featuredCategories = Category::with('children')
            ->where('is_featured', true)
            ->where('is_active', true)
            ->whereNull('parent_id')
            ->take(6)
            ->get();

        $featuredStores = Store::with('user')
            ->where('is_featured', true)
            ->where('status', 'approved')
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('home', compact('featuredProducts', 'featuredCategories', 'featuredStores'));
    }
}
