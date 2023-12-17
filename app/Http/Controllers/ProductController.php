<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        print_r($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0.01',
        ]);

        Product::create($request->all());

        return redirect()->route('index');
    }

    public function show($id) {
        $product = Product::findOrFail($id);    

        return view('show', compact('product'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);    

        return view('edit', compact('product'));
    }

    public function update(Request $request, $id) {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0.01',
        // ]);

        $product = Product::findOrFail($id);    
        $product->update($request->all());
    
        return response()->make($product, 200, ['HX-Trigger' => 'loadProducts']);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->make('', 200, ['HX-Trigger' => 'loadProducts']);
    }
}
