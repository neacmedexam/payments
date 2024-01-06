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

    public function create(){

        return view('payments.payments');
    }

    public function store(PaymentPostRequest $request){

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(100000, 999999)
            . mt_rand(100000, 999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $string = str_shuffle($pin);

        $checkIfExist = ModelsPayments::where('reference', '==',$string)->get();
     
        try{
            if($checkIfExist->count() == 0){
                if($request->hasFile('payment_slip')){

                    $paymentSlipFiles = $request->file('payment_slip');
                    $paymentSlipPaths = [];

                    foreach ($paymentSlipFiles as $paymentSlipFile) {
                        $paymentSlipPath = $paymentSlipFile->store('upload', 'public');
                        $paymentSlipPaths[] = $paymentSlipPath;
                    }
                    $payments = ModelsPayments::create(array_merge($request->validated(),[
                        'payment_slip' => implode(',',$paymentSlipPaths),
                        'reference' => $string,
                        'date_created' => Carbon::now(),
                        'created_by' => $request->ip(),
                    ]));

                    return redirect()->back()->with('success', 'Payment Succcessfully'); 
                }
                else{
                    dd('no file attached');
                }
         
                
            } 
            else{
                return redirect()->back()->with('failed', 'Something went wrong. Please Try Again.');  
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }


    }

    public function view(){
        $getAll = ModelsPayments::select('*')->get();
   

        return view('payments.index',[
            'record' => $getAll,
        ]);

    }
   

    public function edit($id){
        $getRecord = ModelsPayments::where('id','=',$id)->get();
        dd($getRecord);
    }
}
