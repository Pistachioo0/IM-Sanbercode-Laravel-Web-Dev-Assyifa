<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Categories;

class CategoriController extends Controller
{
    public function create() 
    {
        return view('categoryDB.create');
    }

    public function insert  (Request $data) 
    {
        //validasi
        $data->validate([
            'name' => 'required|min:2',
            'description' => 'required',
        ],
        [
            'required' => 'inputan :attribute harus diisi!',
            'min' => 'inputan :attribute minimal :min karakter!',
        ]);

        $now = Carbon::now();

        //masukan data
        DB::table('categories')->insert([
            'name' => $data->input('name'),
            'description' => $data->input('description'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect('/category')->with('success', 'Category berhasil di tambahkan!');

    }

    public function index() {
        $category = DB::table('categories')->get();
 
        return view('categoryDB.dataS', ['category' => $category]);
    }

    public function show($id) {
        $category = Categories::find($id);

        return view('categoryDB.dataD', ['category' => $category]);
    }

    public function edit($id) {
        $category = DB::table('categories')->find($id);

        return view('categoryDB.rubah', ['category' => $category]);    
    }

    public function update($id, Request $data) {
        $data->validate([
            'name' => 'required|min:4',
            'description' => 'required',
        ],
        [
            'required' => 'inputan :attribute harus diisi!',
            'min' => 'inputan :attribute minimal :min karakter!',
        ]);

        $now = Carbon::now();

        //update data
        DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'name' => $data->input('name'),
                    'description' => $data->input('description'),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );

        return redirect('/category')->with('success', 'Category berhasil di Update!');
    }

    public function del($id) {
        DB::table('products')->where('category_id', $id)->delete();
        DB::table('categories')->where('id', $id)->delete();

        return redirect('/category')->with('success', 'Category berhasil di Delete!');
    }
}
