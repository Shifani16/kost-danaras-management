<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class HomeController extends Controller
{
    public function home()
    {
        $billsUnpaid = Payment::where('status', 'Belum Bayar')->count();
        $billsPaid = Payment::where('status', 'Lunas')->count();

        $viewData = $this->loadViewWithUsername();

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
