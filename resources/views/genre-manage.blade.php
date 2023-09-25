@extends('layout.header')

@section('css')
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/app.css">
<link rel="stylesheet" href="../css/genre-manage.css">

@endsection

@section('content')
<div class="container">
    <div class="content-container">
        <table class="table-pane">
            <thead>
                <tr>
                    <th colspan="3">Game Genre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <td colspan="3">{{ $genre->name }}</td>
                    <td>
                        <div style="display: flex; justify-content:end; padding-right:10%">
                            <a class="edit-link" href="{{ url('genre/manage/edit/'.$genre->id) }}">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
