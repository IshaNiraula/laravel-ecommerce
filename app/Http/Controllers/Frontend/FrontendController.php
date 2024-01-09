<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $lastOrderedItem = Order::where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->first();
                $orderId = $lastOrderedItem ? $lastOrderedItem->id : null;
            if ($orderId) {
                $orderItem = OrderItem::where('order_id', $orderId)->orderBy('created_at', 'desc')->first();
                $product = Product::find($orderItem->product_id);
                $personalizedProduct = Product::where('category_id', $product->category_id)->orderBy('created_at', 'desc')->get();
            }
        } else {
            $lastOrderedItem = null;
        }
    
        // Check if $personalizedProduct is undefined and set it as an empty array
        if (!isset($personalizedProduct)) {
            $personalizedProduct = [];
        }
    
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        $newArrivalProducts = Product::latest()->take(14)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(14)->get();
    
        return view('frontend.index', compact('sliders', 'trendingProducts', 'newArrivalProducts', 'featuredProducts', 'personalizedProduct'));
    }
    
    public function searchProducts(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }

    public function newArrival()
    {
        $newArrivalProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrival', compact('newArrivalProducts'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->latest()->get();
        return view('frontend.pages.featured-products', compact('featuredProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {

                return view('frontend.collections.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }
}
