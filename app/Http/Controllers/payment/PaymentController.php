<?php

namespace App\Http\Controllers\payment;

use App\Models\Payment;
use App\Models\Occupant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function lunas(Request $request)
    {
        $query = DB::table('payments')->where('status', '!=', 'Belum Bayar');

        if ($request->has('from_date') && $request->has('to_date')) {
            $fromDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->from_date)->startOfDay();
            $toDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $allPayment = $query->get();

        return view('payments.lunas', compact('allPayment'));
    }

    public function printLunas(Request $request) {
        $query = DB::table('payments')->where('status', '!=', 'Belum Bayar');

        if ($request->has('from_date') && $request->has('to_date')) {
            $fromDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->from_date)->startOfDay();
            $toDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->to_date)->endOfDay();
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        }

        $allPayment = $query->get();

        return view('payments.printLunas', compact('allPayment'));
    }
}
