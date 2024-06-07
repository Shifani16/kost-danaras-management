<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function paymentUser(Request $request)
    {
        $user = Auth::user();
        $payments = Payment::where('occ_id', $user->occ_id)->get();

        return view('users.payments.allPayment', compact('payments'));
    }

    public function print(Request $request)
    {
        $user = Auth::user();
        $query = Payment::where('occ_id', $user->occ_id);

        if ($request->has('from_date') && $request->has('to_date')) {
            $fromDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->from_date)->startOfDay();
            $toDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $allPayment = $query->get();

        return view('users.payments.printPayment', compact('allPayment'));
    }
}
