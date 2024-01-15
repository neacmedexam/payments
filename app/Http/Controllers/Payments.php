<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\PaymentPostRequest;
use App\Models\Payments as ModelsPayments;
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
        $allowedExtensions = [
            'jpg',
            'jpeg',
            'png',
            'heic',
            'pdf',
        ];
        
        try{
            if($checkIfExist->count() == 0){
                if($request->hasFile('payment_slip')){

                    $paymentSlipFiles = $request->file('payment_slip');

                    $paymentSlipPaths = [];
                    foreach ($paymentSlipFiles as $paymentSlipFile) {

                        $extension = $paymentSlipFile->extension();

                        if(in_array($extension,$allowedExtensions)){
                            $paymentSlipPath = $paymentSlipFile->store('upload', 'public');
                            $paymentSlipPaths[] = $paymentSlipPath;
                        }
                        
                    }
                    if($paymentSlipPaths){
                        $payments = ModelsPayments::create(array_merge($request->validated(),[
                            'payment_slip' => implode(',',$paymentSlipPaths),
                            'reference' => $string,
                            'date_created' => Carbon::now(),
                            'created_by' => $request->ip(),
                        ]));
                    }
                    else{
                        return redirect()->back()->with('error', 'File upload failed. Please try again.'); 
                    }
                 

                    return redirect()->back()->with('success', 'Payment Succcessfully'); 
                }
                else{
                    
                    return redirect()->back()->with('error', 'An error occured when uploading the files. Please try again.'); 
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

    public function view(Request $request){
        $getAll = ModelsPayments::select('*')->orderBy('id','desc')->simplePaginate(10);
        

        // dd($getAll,compact('getAll'));
      

        return view('payments.index',[
            'record' => $getAll,
        ])->render();

    }
   
    public function search(Request $request){
        $get = ModelsPayments::where('reference','like','%'.$request->search_string.'%')
        ->orWhere('name','like','%'.$request->search_string.'%')
        ->orWhere('facebook','like','%'.$request->search_string.'%')
        ->orWhere('email','like','%'.$request->search_string.'%')
        ->orWhere('contact_number','like','%'.$request->search_string.'%')
        ->orWhere('service_availed','like','%'.$request->search_string.'%')
        ->orWhere('mode_of_payment','like','%'.$request->search_string.'%')
        ->orWhere('other_mop','like','%'.$request->search_string.'%')
        ->orWhere('verified_by','like','%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->simplePaginate(10);
        
        if($get->count() >= 1){
            return view('payments.table',[
                'record' => $get,
            ])->render();
        }
        else{
            return response()->json([
                'status' => 'nothing_found',
            ]);
        }
    }

    public function edit($id){
        $getRecord = ModelsPayments::find($id);
        

        return view('payments.edit',[
            'record' => $getRecord,
        ]);
        
    }
    
    public function update(Request $request,$id){

        $user = ModelsPayments::find($id);

        $user->update([
            'date_verified' => $request->input('date_verified'),
            'amount_deposited_php' => $request->input('amount_deposited_php'),
            'amount_deposited_usd' => $request->input('amount_deposited_usd'),
            'date_update_admin' => $request->input('date_update_admin'),
            'remarks' => $request->input('remarks'),
        ]);

        if($request->input('date_verified')){
            $user->update([
                'payment_verified' => 1,
                'verified_by' => auth()->user()->name,
            ]);
        }

        return redirect()->back()->with('success', 'Payment Updated!'); 
    }
}
