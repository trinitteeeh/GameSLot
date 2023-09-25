<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_query = $request->search;
        $games =  Game::where('name', 'LIKE', "%$search_query%")->paginate(10)->appends(['search' => $search_query]);
        return view('home')->with('games', $games);
    }

    public function showGameDetailPage(Request $request)
    {
        $game = Game::find($request->route('id'));
        return view('game-detail')->with('game', $game);
    }

    public function showManageGamePage()
    {
        $games = Game::all();
        return view('game-manage')->with('games', $games);
    }

    public function deleteGame(Request $request)
    {
        $game = Game::find($request->route('id'));
        Storage::delete('public/images/' . $game->image);
        Game::find($game->id)->delete();

        return redirect()->back();
    }

    public function showUpdateGamePage(Request $request)
    {
        $game = Game::find($request->route('id'));
        $genres = Genre::all();
        return view('game-update')->with('game', $game)->with('genres', $genres);
    }

    public function updateGame(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'genre' => 'required',
            'pegi_rating' => 'required|in:0,3,7,12,16,18'
        ]);


        $genre = null;
        $game = Game::find($request->route('id'));

        if ($request->genre == "Add New Genre") {
            $request->validate(['new_game_genre' => 'required|unique:genres,name']);
            Genre::insert([
                'name' => $request->get('new_game_genre')
            ]);
            $genre = Genre::where('name', $request->get('new_game_genre'))->first();
        } else {
            $genre = Genre::where('name', $request->get('genre'))->first();
        }

        Game::where('id', $request->route('id'))->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'pegi_rating' => $request->pegi_rating,
            'genre_id' => $genre->id,
        ]);

        if ($request->image !== null) {
            Storage::delete('public/images/' . $game->image);
            Storage::putFileAs('public/images/', $request->image, $game->image);
        }

        return redirect()->back();
    }

    public function showAddGamePage()
    {
        $genres = Genre::all();
        return view('game-add')->with('genres', $genres);
    }

    public function addGame(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'genre' => 'required',
            'pegi_rating' => 'required|in:0,3,7,12,16,18'
        ]);

        $img = $request->file('image');
        $newGameId = Game::orderBy('id', 'desc')->pluck('id')->first();
        $newGameId = $newGameId + 1;
        $imgID = sprintf('GM%03d.%s', $newGameId, $img->getClientOriginalExtension());

        $genre = Genre::where('name', $request->get('genre'))->first();

        Storage::putFileAs('public/images/', $img, $imgID);

        Game::insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'pegi_rating' => $request->pegi_rating,
            'image' => $imgID,
            'genre_id' => $genre->id,
        ]);

        return redirect('/');
    }
}
