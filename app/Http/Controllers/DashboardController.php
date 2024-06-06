<?php

namespace App\Http\Controllers;

use App\Models\Occupant;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $viewData = $this->loadViewWithUsername();


        $totalOccupants = Occupant::count();
        $billsUnpaid = Payment::where('status', 'Belum Bayar')->count();
        $availableRooms = Room::where('occupant', 'None')->count();

        $viewData = array_merge($viewData, compact('totalOccupants', 'billsUnpaid', 'availableRooms'));

        return view('dashboard', $viewData);
    }

    public function loadViewWithUsername()
    {
        $user = auth()->user();
        if ($user) {
            $userData = [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('Y-m-d'),
            ];
        } else {
            $userData = [];
        }

        return $userData;
    }
}
