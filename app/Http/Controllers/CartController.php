<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function showCartPage()
    {
        $carts = Session::get('carts');
        return view('cart')->with('carts', $carts);
    }

    public function addToCart(Request $request)
    {
        $game = Game::find($request->route('id'));
        $carts = Session::get('carts');

        if (isset($carts[$game['id']])) {
            $carts[$game['id']]['qty'] += 1;
        } else {
            $carts[$game['id']] = $game;
            $carts[$game['id']]['qty'] = 1;
        }
        Session::put('carts', $carts);

        return redirect('/')->with('message', 'Sucessfully Added to the Cart');
    }

    public function updateCart(Request $request)
    {
        $game = Game::find($request->route('id'));
        $carts = Session::get('carts');
        foreach ($carts as $cart) {
            if ($cart['id'] == $game->id) {
                $cart['qty'] = 4;
                break;
            }
        }
        Session::put('carts', $carts);
        return redirect()->back();
    }

    public function removeCart(Request $request)
    {
        $game = Game::find($request->route('id'));
        $carts = Session::get('carts');
        foreach ($carts as $cart) {
            if ($cart['id'] == $game->id) {
                unset($carts[$cart['id']]);
                break;
            }
        }
        Session::put('carts', $carts);
        return redirect()->back();
    }
}
