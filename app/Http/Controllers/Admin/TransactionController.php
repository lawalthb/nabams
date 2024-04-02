<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function List()
    {
        $transactions = Transactions::select(
            'id',
            'purpose',
            'email',
            'amount',
            'fullname',
            'reference',
            'status',
            'paid_at',
            'channel',
            'gateway_response',
        )->get();
        $total_success = Transactions::where('status', "Success")->sum('amount');
        $total_pending = Transactions::where('status', "Pending")->sum('amount');
        return view("admin.transactions.list", [
            'transactions' => $transactions,
            'total_success' => $total_success,
            'total_pending' => $total_pending
        ]);
    }


    public function Blank()
    {
        return view("admin.transactions.blank");
    }
}
