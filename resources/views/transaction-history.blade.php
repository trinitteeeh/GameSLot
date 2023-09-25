@extends('layout.header')

@section('css')
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/app.css">
<link rel="stylesheet" href="css/transaction-history.css">

@endsection

@section('content')
<div class="container">
    <div class="content-container">
        <table class="table-pane">
            <thead>
                <tr>
                    <th>TRANSACTION ID</th>
                    <th>TRANSACTION DATE</th>
                    <th>TOTAL ITEM</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->date }}</td>
                    <td>{{$transaction->transactionDetails->count() }}</td>
                    <td><a class="detail-link"
                            href="{{ url('transaction-history/detail/'.$transaction->id) }}">Detail</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
