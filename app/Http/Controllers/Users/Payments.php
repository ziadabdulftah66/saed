<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;

class Payments extends Controller
{
    public function index()
    {
        $payments = Payment::where('user_id',auth()->user()->id)->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);


        return view('users.user_payments.index', compact('payments'));
    }


}
