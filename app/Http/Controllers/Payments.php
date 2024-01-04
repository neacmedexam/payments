<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentPostRequest;
use App\Models\Payments as ModelsPayments;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
class Payments extends Controller
{
    //

    public function show(){

     
   
        return view('payments');
    }
    public function store(PaymentPostRequest $request){
 

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(100000, 999999)
            . mt_rand(100000, 999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        $checkIfExist = ModelsPayments::where('reference', '==',$string)->get();
        $captcha = $request->validated();
        $score = RecaptchaV3::verify($captcha['g-recaptcha-response'],'verification');
        // $score = RecaptchaV3::verify($request->get('g-recaptcha-response'),'register');
        dd($score);
        try{
            if($checkIfExist->count() == 0){
                $payments = ModelsPayments::create(array_merge($request->validated(),[
                    'reference' => $string,
                    'date_created' => Carbon::now(),
                    'created_by' => $request->ip(),
                ]));
                    
                return redirect()->back()->with('success', 'Payment Succcessfully'); 
                
            } 
            else{
                return redirect()->back()->with('failed', 'Something went wrong, Please Try Again.');  
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }


    }
}
