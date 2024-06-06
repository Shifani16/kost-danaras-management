<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class UserController extends Controller
{
    public function paymentUser(Request $request)
    {
        $user = Auth::user();
        $payments = Payment::where('occ_id', $user->occ_id)->get();
        
        return view('users.payments.allPayment', compact('payments'));
    }
}
