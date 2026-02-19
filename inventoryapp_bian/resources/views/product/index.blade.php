@extends('layout.master')

@section('title')
    List Produk
@endsection

@section('content')

@if (Auth::check() && Auth::user()->role === 'admin')
<a href="/product/create" class="btn btn-primary mb-3">Create</a>

@if(session()->has('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@endif

<div class="container-fluid mt-4">
    <div class="row g-4">
        @forelse ($products as $item)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">

            <div class="product-card">

                <!-- IMAGE -->
                <div class="product-image">
                    <img src="{{ asset('image/' . $item->image) }}"
                         alt="{{ $item->name }}">
                    
                    <span class="badge-category">
                        {{ $item->category->name }}
                    </span>
                </div>

                <!-- BODY -->
                <div class="product-body">

                    <h6 class="product-title" title="{{ $item->name }}">
                        {{ Str::limit($item->name, 50) }}
                    </h6>

                    <p class="product-stock">
                        Stock: {{ $item->stock }}
                    </p>

                    <div class="product-footer">
                        <div class="product-price">
                            Rp{{ number_format($item->price,0,',','.') }}
                        </div>

                        <a href="/product/{{ $item->id }}"
                           class="btn-detail">
                            Detail
                        </a>
                    </div>

                    @if (Auth::check() && Auth::user()->role === 'admin')
                    <div class="admin-action">
                        <a href="/product/{{ $item->id }}/edit"
                           class="btn btn-sm btn-warning w-100">
                            Edit
                        </a>

                        <form action="/product/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger w-100"
                                    onclick="return confirm('Yakin hapus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                    @endif

                </div>
            </div>

        </div>
        @empty
        <div class="col-12 text-center mt-5">
            <p>Produk Kosong</p>
        </div>
        @endforelse
    </div>
</div>

@endsection


@push('myscript')
<style>

/* 🔥 CARD PREMIUM */
.product-card{
    background:#fff;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:all .25s ease;
    height:100%;
    display:flex;
    flex-direction:column;
}

.product-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 40px rgba(0,0,0,0.15);
}

/* IMAGE */
.product-image{
    position:relative;
    height:190px;
    overflow:hidden;
    background:#f3f4f6;
}

.product-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .4s ease;
}

.product-card:hover .product-image img{
    transform:scale(1.08);
}

/* BADGE */
.badge-category{
    position:absolute;
    top:10px;
    left:10px;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff;
    font-size:11px;
    padding:4px 10px;
    border-radius:999px;
    font-weight:600;
}

/* BODY */
.product-body{
    padding:14px;
    display:flex;
    flex-direction:column;
    flex:1;
}

/* TITLE */
.product-title{
    font-size:15px;
    font-weight:600;
    margin-bottom:4px;
    line-height:1.3;
    height:38px;
    overflow:hidden;
}

/* STOCK */
.product-stock{
    font-size:12px;
    color:#6b7280;
    margin-bottom:10px;
}

/* FOOTER */
.product-footer{
    margin-top:auto;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:8px;
}

/* PRICE */
.product-price{
    font-size:18px;
    font-weight:700;
    color:#111827;
}

/* BUTTON DETAIL */
.btn-detail{
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff;
    border:none;
    padding:6px 14px;
    border-radius:8px;
    font-size:12px;
    font-weight:600;
    text-decoration:none;
    transition:.2s;
    white-space:nowrap;
}

.btn-detail:hover{
    opacity:.9;
    color:#fff;
}

/* ADMIN */
.admin-action{
    display:flex;
    gap:6px;
    margin-top:10px;
}

</style>
@endpush
