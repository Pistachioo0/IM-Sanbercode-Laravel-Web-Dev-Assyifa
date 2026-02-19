@extends('layout.master')
@section('title')
    List Category
@endsection
@section('content')
    <a href="/category/create">
        <button class="mb-2">
            Create
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <form action="/category/{{$item->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/category/{{$item->id}}" class="btn btn-info btn-sm ">Info Detail</a>
                            <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm ">Edit Data</a>
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Category Masih Kosong</td>
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
</style>
@endpush