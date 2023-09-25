@extends('layout.header')

@section('css')
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="../css/game-manage.css">

@endsection

@section('content')
<div class="container">
    <div class="content-container">
        <div class="add-button-pane">
            <a href="/game/manage/add">Add Game</a>
        </div>
        <table class="table-pane">
            <thead>
                <tr>
                    <th colspan="3">GAME TITLE</th>
                    <th>PEGI RATING</th>
                    <th>GAME GENRE</th>
                    <th>GAME GENRE</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                <tr>
                    <td>
                        <div class="image-container">
                            <img src="{{url('storage/images/'.$game->image)}}" alt="img">
                        </div>
                    </td>
                    <td colspan="2">{{ $game->name }}</td>
                    <td>{{ $game->pegi_rating }}</td>
                    <td>
                        <div class="genre-pane">
                            {{ $game->genre->name }}
                        </div>
                    </td>
                    <td>{{ $game->price }}</td>
                    <td><a class="edit-link" href="{{ url('game/manage/edit/'.$game->id) }}">Edit</a></td>
                    <td><a class="delete-link" href="{{ url('game/manage/delete/'.$game->id) }}">Delete</a></td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
