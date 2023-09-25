@extends('layout.header')

@section('css')
<link rel="stylesheet" href="css/home.css">
@endsection

@section('content')
<div class="container">
    <div class="notification">
        <span class="close-btn">&times;</span>
        Sucessfully added to cart
    </div>
    <div class="card-pane">
        @foreach ($games as $game)
        <div class="card">
            <div class="image-container">
                <div class="image-pane">
                    <img src="{{url('storage/images/'.$game->image)}}" alt="img">
                </div>
            </div>
            <div class="text">
                <h4><a href={{ url('game/detail/'.$game->id) }}>{{ $game->name }}</a></h4>
                <p> {{ $game->genre->name }}</p>
            </div>
            <div class="price-pane">
                @if ($game->price > 0)
                <p>${{ $game->price }}</p>
                @else
                <p>free</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="pagination-container">
        <ul class="pagination-pane">
            <li class="pagination-item">
                <a href=" {{$games->previousPageUrl()}}">&laquo;</a>
            </li>
            @for($i=1; $i<=$games->lastPage(); $i++)
                @if($i == $games->currentPage())
                <li>
                    <a" href="#">{{$i}}</a>
                </li>
                @else
                <li>
                    <a href="{{$games->url($i)}}">{{$i}}</a>
                </li>
                @endif
                @endfor
                <li>
                    <a href="{{$games->nextPageUrl()}}">&raquo;</a>
                </li>
        </ul>
    </div>
</div>

@endsection
