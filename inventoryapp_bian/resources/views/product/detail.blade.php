@extends('layout.master')
@section('title')
    Detail Product
@endsection
@section('content')
    <img src="{{asset('image/'. $products->image)}}" width="100%" alt="">
    <h1 class="text-primary">{{$products->name}}</h1>
    <p>Stok : {{$products->stock}}</p>
    <p class="text-primary">Harga : {{$products->price}}</p>
    <p>{{$products->description}}</p>
    <a href="/product" class="shop-cart-button text-decoration-none"><span>Kembali</span></a>
@endsection
@push('myscript')
<style>
    .shop-cart-button {
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.25rem;
        padding: 0.5rem;
        width: 100%;
        background-image: var(--bg-linear);
        font-size: 0.75rem;
        font-weight: 500;
        color: var(--light) !important;
        border: 2px solid hsla(262, 83%, 58%, 0.5);
        border-radius: 0.5rem;
        box-shadow: inset 0 0 0.25rem 1px var(--light);
        transition: opacity 0.3s;
        }

        .shop-cart-button:hover {
        opacity: 0.9;
        }
</style>
@endpush