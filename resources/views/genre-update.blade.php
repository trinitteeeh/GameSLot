@extends('layout.header')

@section('css')
<link rel="stylesheet" href="../../../css/header.css">
<link rel="stylesheet" href="../../../css/app.css">
<link rel="stylesheet" href="../../../css/genre-update.css">

@endsection

@section('content')

<div class="container">
    <div class="form-container">
        <form action={{ url('/genre/manage/edit/'.$genre->id) }} method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <table class="form-pane">
                <thead>
                    <tr>
                        <th colspan="3">
                            <div style="display: flex; justify-content: center; align-item:center">
                                <h1 sytle=" grid-column: 1 / span 2;">Update genre</h1>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label class="form-label">Game Genre</label></td>
                        <td colspan="2"><input type="text" placeholder="Name" name="name" value="{{ $genre->name }}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style=" display: flex; justify-content:end">
                <input class="submit-btn" type="submit" value="Update">
            </div>
        </form>
    </div>
</div>

@endsection
