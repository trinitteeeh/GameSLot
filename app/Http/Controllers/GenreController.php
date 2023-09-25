<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showManageGenrePage()
    {
        $genres = Genre::all();
        return view('genre-manage')->with('genres', $genres);
    }

    public function showUpdateGenrePage(Request $request)
    {
        $genre = Genre::find($request->route('id'));
        return view('genre-update')->with('genre', $genre);
    }

    public function updateGenre(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres,name'
        ]);

        Genre::where('id', $request->route('id'))->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }
}
