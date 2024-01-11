<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function home(){
        $record = Payments::get();
        // dd($record);

        return view('dashboard.dashboard');
    }
}
