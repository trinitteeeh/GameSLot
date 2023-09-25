<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function checkout()
    {

        $transaction = Transaction::create([
            'date' => Carbon::now(),
            'user_id' => Auth::user()->id,
        ]);

        $carts = Session::get('carts');

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'game_id' => $cart->id,
                'quantity' => $cart->qty
            ]);
            unset($carts[$cart['id']]);
        }

        return redirect('/');
    }

    public function showTransactionHistory()
    {
        $transactions = Transaction::all();
        return view('transaction-history')->with('transactions', $transactions);
    }
}
