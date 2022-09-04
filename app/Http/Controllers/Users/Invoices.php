<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class Invoices extends Controller
{
    public function index()
    {
      $invoices = Invoice::where('user_id',auth()->user()->id)->with('users')->orderBy('id', 'desc')->paginate(PAGINATION_COUNT);

        return view('users.user_invoices.index', compact('invoices'));
    }
    public function show($id)
    {
        $invoice = Invoice::with(['details','users'])->findOrFail($id);
        return view('users.user_invoices.show', compact('invoice'));
    }
    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }
}
