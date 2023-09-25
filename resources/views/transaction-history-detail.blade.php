@extends('layout.header')

@section('css')
<link rel="stylesheet" href="../../css/header.css">
<link rel="stylesheet" href="../../css/app.css">
<link rel="stylesheet" href="../../css/transaction-history.css">

@endsection

@section('content')
<div class="container">
    <div class="content-container">
        <table class="table-pane">
            <thead>
                <tr>
                    <th>GAME TITLE</th>
                    <th>GAME PRICE</th>
                    <th>QUANTITY</th>
                    <th>SUB TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionDetails as $td)
                <tr>
                    <td>{{$td->game->name}}</td>
                    <td>{{$td->game->price }}</td>
                    <td>{{$td->quantity }}</td>
                    <td>{{$td->game->price * $td->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
