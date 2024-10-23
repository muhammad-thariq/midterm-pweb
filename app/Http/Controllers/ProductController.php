<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model
use Illuminate\Http\Request;

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
}
