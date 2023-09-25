<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function showTrDetailHistory(Request $request)
    {
        $transactionDetails = TransactionDetail::where('transaction_id', $request->route('id'))->get();
        return view('transaction-history-detail')->with('transactionDetails', $transactionDetails);
    }
}
