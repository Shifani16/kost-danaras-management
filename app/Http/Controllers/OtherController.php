<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function aturan() {
        return view('others.aturan');
    }

    public function metode() {
        return view('others.metode');
    }

    public function metodeUser() {
        return view('users.others.metode');
    }

    public function aturanUser() {
        return view('users.others.aturan');
    }
    
}
