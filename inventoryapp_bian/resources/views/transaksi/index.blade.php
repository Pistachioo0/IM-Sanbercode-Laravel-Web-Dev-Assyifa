@extends('layout.master')
@section('title')
    List Transaksi
@endsection
@section('content')
    <a href="/transaksi/create">
        <button class="mb-2">
            Transaksi
        </button>
    </a>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Product</th>
                <th scope="col">Type(in/out)</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>
                        @if($item->type == 'in')
                        <span class="badge bg-primary">in</span>
                        @else
                        <span class="badge bg-danger">out</span>
                        @endif
                    </td>
                    <td>{{$item->amount}}</td>
                </tr>
            @empty
                <tr>
                    <td>Belum ada Transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
@push('myscript')
<style>
    button {
        position: relative;
        padding: 5px 20px;
        border-radius: 7px;
        border: 1px solid rgb(61, 106, 255);
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 2px;
        color: #000000;
        overflow: hidden;
        box-shadow: 0 0 0 0 transparent;
        -webkit-transition: all 0.2s ease-in;
        -moz-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
    }

    button:hover {
        background: rgb(61, 106, 255);
        color: #ffffff;
        box-shadow: 0 0 30px 5px rgba(0, 142, 236, 0.815);
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }

    button:hover::before {
        -webkit-animation: sh02 0.5s 0s linear;
        -moz-animation: sh02 0.5s 0s linear;
        animation: sh02 0.5s 0s linear;
    }

    button::before {
        content: '';
        display: block;
        width: 0px;
        height: 86%;
        position: absolute;
        top: 7%;
        left: 0%;
        opacity: 0;
        background: rgb(61, 106, 255);
        box-shadow: 0 0 50px 30px #fff;
        -webkit-transform: skewX(-20deg);
        -moz-transform: skewX(-20deg);
        -ms-transform: skewX(-20deg);
        -o-transform: skewX(-20deg);
        transform: skewX(-20deg);
    }

    @keyframes sh02 {
        from {
            opacity: 0;
            left: 0%;
        }

        50% {
            opacity: 1;
        }

        to {
            opacity: 0;
            left: 100%;
        }
    }

    button:active {
        box-shadow: 0 0 0 0 transparent;
        -webkit-transition: box-shadow 0.2s ease-in;
        -moz-transition: box-shadow 0.2s ease-in;
        transition: box-shadow 0.2s ease-in;
    }

    .shadow__btn {
        padding: 3px 20px;
        width: 100%;
        border: none;
        font-size: 14px;
        color: #fff;
        border-radius: 7px;
        letter-spacing: 4px;
        margin-top: 5px;
        font-weight: 700;
        text-transform: uppercase;
        transition: 0.5s;
        transition-property: box-shadow;
        }

        .shadow__btn {
        background: rgb(0,140,255);
        box-shadow: 0 0 25px rgb(0,140,255);
        }

        .shadow__btn:hover {
        box-shadow: 0 0 5px rgb(0,140,255),
                    0 0 25px rgb(0,140,255),
                    0 0 50px rgb(0,140,255),
                    0 0 100px rgb(0,140,255);
        }
</style>
@endpush