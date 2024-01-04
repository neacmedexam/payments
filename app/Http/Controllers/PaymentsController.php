<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentPostRequest;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function store(PaymentPostRequest $request){
        $validated = $request->validated();
        dd($validated);
    }
}
