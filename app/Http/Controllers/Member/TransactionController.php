<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\WebColours;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function List(Request  $request)
    {
        $user_id = auth()->user()->id;
        $transactions = Transactions::select(
            'id',
            'purpose',
            'email',
            'amount',

            'reference',
            'status',
            'paid_at',

            'gateway_response',
        )->where('purpose', $request->purpose)->where('user_id', $user_id)->get();

        return view("member.transactions.list", [
            'transactions' => $transactions,

        ]);
    }


    public function Blank()
    {


        return view("member.transactions.blank");
    }
}
