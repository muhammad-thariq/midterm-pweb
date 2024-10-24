<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        // dd($products);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Use the request validation method instead
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Price' => 'required|numeric',
            'Description' => 'nullable|string|max:1000',
            'Photo' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $Photo = $request->file('Photo');
        $Photo->storeAs('', $Photo->hashName());


        // Create the product using the validated data
        // Product::create($validatedData);
        Product::create([
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Description' => $request->Description,
            'Photo' => $Photo->hashName()
            
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'Price' => 'required|numeric'
        ]);

        $product->Name = $request->Name;
        $product->Price = str_replace(".","",$request->Price);
        $product->Description = $request->Description;
    
        if($request->file('Photo'))
        {
            if ($product->Photo != "noimage.png") {
                Storage::disk('local')->delete(''. $product->Photo);
            }

            $Photo = $request->file('Photo');
            $Photo->storeAs('', $Photo->hashName());    
            $product->Photo = $Photo->hashName();
        }

        $product->update();

        return redirect()->route('products.index')->with('success', 'Update Added Successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->Photo != "noimage.png") {
            Storage::disk('local')->delete(''. $product->Photo);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success','Delete Product Success');
    }
}
