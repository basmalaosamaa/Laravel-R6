<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->limit(3)->get();
        return view('index', compact('products'));
    }
    public function indexAdmin()
    {
        $products = Product::get();
        return view('productsAdmin', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'shortDesc' => 'required|string|max:1000',
            'price' => 'required|decimal:1',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $data['image'] = $this->uploadFile($request->image, 'assets/images/product');
        Product::Create($data);
        return redirect()->route('productsAdmin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'shortDesc' => 'required|string|max:1000',
            'price' => 'required|decimal:2',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/product');
        }

        $product->update($data);
        return redirect()->route('productsAdmin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return redirect()->route('productsAdmin.index');

    // }
}
