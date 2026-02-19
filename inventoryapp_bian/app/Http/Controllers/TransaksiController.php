<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index() {
        $user = Auth::user();
        $product = Products::get();
        
        if($user->role === 'admin') {
            $transaksi = Transaksi::get();
        } else {
            $transaksi = Transaksi::where('user_id', $user->id)->get();
        }
        
        return view('transaksi.index', ['transaksi' => $transaksi, 'product' => $product]);
    }

    public function create() {
        $product = Products::get();

        return view('transaksi.create', ['product' => $product]);
    }

    public function masuk(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric|min:1',
            'notes' => 'required',
        ]);

        $idUser = Auth::id();

        $transaksi = new Transaksi;
        $transaksi->product_id = $request->input('product_id');
        $transaksi->type = $request->input('type');
        $transaksi->amount = $request->input('amount');
        $transaksi->amount = $request->input('amount');
        $transaksi->notes = $request->input('notes');
        $transaksi->user_id = $idUser;

        $transaksi->save();

        $products = Products::find($request->input('product_id'));

        if($request->type == 'in') {
            $products->increment('stock', $request->amount);
        } else {
            $products->decrement('stock', $request->amount);
        }

        return redirect('/transaksi')->with('success', 'Transaksi Berhasil!');
    }
}
