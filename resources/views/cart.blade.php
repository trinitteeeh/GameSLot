@extends('layout.header')

@section('css')
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="css/cart.css">

@endsection

@section('content')
<div class="container">
    <div class="content-container">
        <div class="add-button-pane">
            <a href="/checkout">Check out</a>
        </div>
        <table class="table-pane">
            <thead>
                <tr>
                    <th colspan="3">GAME TITLE</th>
                    <th>GAME PRICE</th>
                    <th>QUANTITY</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>
                        <div class="image-container">
                            <img src="{{url('storage/images/'.$cart['image'])}}" alt="img">
                        </div>
                    </td>
                    <td colspan="2">{{$cart['name'] }}</td>
                    <td>${{$cart['price'] }}</td>
                    <td><input type="number" placeholder="Quantity" name="quantity" value="{{ $cart['qty'] }}"></td>
                    <td><a class="edit-link" href="{{ url('cart/update/'.$cart['id']) }}">Update</a></td>
                    <td><a class="delete-link" href="{{ url('cart/remove/'.$cart['id']) }}">Remove</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
