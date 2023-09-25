@extends('layout.header')

@section('css')
<link rel="stylesheet" href="../../css/header.css">
<link rel="stylesheet" href="../../css/app.css">
<link rel="stylesheet" href="../../css/game-detail.css">
<?php
  $image_url = "../storage/".$game->image;

?>
<style>

</style>

@endsection

@section('content')

<?php
  $image_url = "../storage/images/".$game->image;
?>


<div class="container">
    <div class="detail-container">
        <img src="{{ asset($image_url) }}">
        <div class="detail-pane">
            <div class="title-pane">
                <h1>{{ $game->name }}</h1>
            </div>
            <div class="lower-part">
                <div class="left-section">
                    <div class="genre-container">
                        <p>{{ $game->genre->name }}</p>
                    </div>
                    <div class="description-container">
                        <p>{{ $game->description }}</p>
                    </div>

                </div>
                <div class="right-section">
                    <div class="right-top-section">
                        <p class="game-pegi">{{ $game->pegi_rating }}</p>
                        <p class="game-price">${{ $game->price }}</p>
                    </div>
                    <div class="right-bottom-section">
                        <a href="{{ url('cart/add/'.$game->id) }}">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
