<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class HomeController extends Controller
{
    public function home()
    {
        $user = auth()->user();

        if ($user) {
            $occId = $user->occ_id;

            $billsUnpaid = Payment::where('occ_id', $occId)->where('status', 'Belum Bayar')->count();
            $billsPaid = Payment::where('occ_id', $occId)->where('status', 'Lunas')->count();

            $viewData = $this->loadViewWithUsername();
        } else {
            $billsUnpaid = 0;
            $billsPaid = 0;
            $viewData = [];
        }

        $viewData = array_merge($viewData, compact('billsUnpaid', 'billsPaid'));

        return view('users.home', $viewData);
    }

    public function loadViewWithUsername()
    {
        $user = auth()->user();
        if ($user) {
            $payment = Payment::where('occ_id', $user->occ_id)->latest()->first();
            $paymentStatus = $payment ? $payment->status : 'Belum Bayar';

            $userData = [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d'),
                'status' => $paymentStatus,
            ];
        } else {
            $userData = [];
        }

        return $userData;
    }
}