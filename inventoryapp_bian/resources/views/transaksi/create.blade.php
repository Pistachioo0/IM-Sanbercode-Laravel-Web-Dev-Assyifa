@extends('layout.master')
@section('title')
    Transaksi
@endsection
@section('content')
    <form action="/transaksi" method="POST">
        
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
            <label class="form-label">Product</label>
            <select name="product_id" id="">
                <option value="">--Pilih Produk--</option>
                @forelse ($product as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @empty
                    <option value="">Produk Kosong</option>
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipe Transaksi</label>
            <select name="type" id="" class="form-control">
                <option value="">--Pilih Tipe Transaksi--</option>
                <option value="in">Masuk (in)</option>
                <option value="out">Keluar (out)</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="amount" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="notes" class="form-control" cols="30" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection