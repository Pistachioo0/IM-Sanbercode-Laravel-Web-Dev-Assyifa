<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use File;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = Products::get();

       return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categories::all();

        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('image'), $imageName);

        $products = new Products;
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->stock = $request->input('stock');
        $products->price = $request->input('price');
        $products->category_id = $request->input('category_id');
        $products->image = $imageName;

        $products->save();
        return redirect('/product')->with('success', 'Data Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Products::find($id);

        return view('product.detail', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Products::find($id);
        $category = Categories::get();
        return view('product.edit', ['products' => $products, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $products = Products::find($id);
        if ($request->hasFile('image')) {
            if($products->image) {
                if(File::exists(public_path('image/'.$products->image))) {
                    File::delete(public_path('image/'.$products->image));
                };

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('image'), $imageName);
                $products->image = $imageName;
            }
        };

        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->stock = $request->input('stock');
        $products->price = $request->input('price');
        $products->category_id = $request->input('category_id');

        $products->save();
        return redirect('/product')->with('success', 'Data Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::find($id);

        if($products->image) {
            if(File::exists(public_path('image/'.$products->image))) {
                File::delete(public_path('image/'.$products->image));
            };
        };

        $products->delete();   
        return redirect('/product')->with('success', 'Data Produk berhasil dihapus!');
    }
}
