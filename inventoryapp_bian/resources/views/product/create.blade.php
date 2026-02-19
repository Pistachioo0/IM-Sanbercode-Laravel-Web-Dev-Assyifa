@extends('layout.master')
@section('title')
    Tambah Product
@endsection
@section('content')
    <form action="/product" method="POST" enctype="multipart/form-data">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <div class="mb-3">
            <label class="form-label">Category Barang</label>
            <select name="category_id" id="" class="form-control">
                <option value="">--Pilih category--</option>
                @forelse ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    <option value="">Belum ada category barang</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi Produk</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Produk</label>
            <input type="file" class="form-control" name="image" >
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Produk</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection