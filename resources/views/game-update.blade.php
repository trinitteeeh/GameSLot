@extends('layout.header')

@section('css')
<link rel="stylesheet" href="../../../css/header.css">
<link rel="stylesheet" href="../../../css/app.css">
<link rel="stylesheet" href="../../../css/game-update.css">

@endsection

@section('content')

<div class="container">
    <div class="form-container">
        <form action={{ url('/game/manage/edit/'.$game->id) }} method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="form-pane">
                <thead>
                    <tr>
                        <th colspan="3">
                            <div style="display: flex; justify-content: center; align-item:center">
                                <h1 sytle=" grid-column: 1 / span 2;">Update Game</h1>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label class=" ">Game Title</label></td>
                        <td colspan="2"><input type="text" placeholder="Name" name="name" value="{{ $game->name }}">
                        </td>
                    </tr>
                    @error('name')
                    <tr>
                        <td></td>
                        <td> <strong class="error-msg"> {{ $message }} </strong></td>
                    </tr>
                    @enderror

                    <tr>
                        <td><label class=" ">Photo</label></td>
                        <td>
                            <div class="image-container">
                                <div class="image-pane">
                                    <img src="{{url('storage/images/'.$game->image)}}" alt="img">
                                </div>
                            </div>
                        </td>
                        <td><input type="file" placeholder="Choose" name="image"></td>
                    </tr>
                    @error('image')
                    <tr>
                        <td></td>
                        <td> <strong class="error-msg"> {{ $message }} </strong></td>
                    </tr>
                    @enderror

                    <tr>
                        <td><label class=" ">Game Description</label></td>
                        <td colspan="2"><textarea name="description" wrap="soft"
                                value="{{ $game->description }}">{{ $game->description }} </textarea>
                        </td>
                        </td>
                    </tr>
                    @error('description')
                    <tr>
                        <td></td>
                        <td> <strong class="error-msg"> {{ $message }} </strong></td>
                    </tr>
                    @enderror

                    <tr>
                        <td><label class="  ">Game Price</label></td>
                        <td colspan="2"><input type="text" placeholder="Price" name="price" value="{{ $game->price }}">
                        </td>
                    </tr>
                    @error('price')
                    <tr>
                        <td></td>
                        <td> <strong class="error-msg"> {{ $message }} </strong></td>
                    </tr>
                    @enderror

                    <tr>
                        <td><label class=" ">Game Genre</label></td>
                        <td colspan="2">
                            <select value="{{$game->genre->name}}" name="genre" onchange="showNewGenre(event)"
                                id="genre">
                                @foreach($genres as $genre)
                                @if ($genre->name == $game->genre->name)
                                <option selected value="{{$genre->name}}">{{$genre->name}}</option>
                                @else
                                <option value="{{$genre->name}}">{{$genre->name}}</option>
                                @endif
                                @endforeach
                                <option value="Add New Genre">Add New Genre</option>
                            </select>
                        </td>
                    </tr>
                    @error('genre')
                    <tr>
                        <td></td>
                        <td> <strong class="error-msg"> {{ $message }} </strong></td>
                    </tr>
                    @enderror

                    <tr id="new-genre-pane">
                        <td><label class=" ">New Game Genre</label></td>
                        <td colspan="2"><input type="text" placeholder="New Game Genre" name="new_game_genre"></td>
                    </tr>
                    <tr>
                        <td><label class="  ">PEGI Rating</label></td>
                        <td colspan="2"><input type="text" placeholder="PEGI" name="pegi_rating"
                                value="{{ $game->pegi_rating }}""></td>
                    </tr>
                    @error('new_game_genre')
                    <tr>
                        <td></td>
                        <td> <strong class=" error-msg"> {{ $message }} </strong></td>
                    </tr>
                    @enderror

                </tbody>
            </table>
            <div style=" display: flex; justify-content:center">
                <input class="submit-btn" type="submit" value="Update">
            </div>
        </form>

        <script>
            let newGenrePane = document.getElementById('new-genre-pane');

        function showNewGenre(e){
            if(e.target.value == "Add New Genre"){
                newGenrePane.style.display = "contents"
            }else{
                newGenrePane.style.display = "none"
            }
        }
        </script>
    </div>

    @endsection
