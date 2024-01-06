<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Accounts as ModelsAccounts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Accounts extends Controller
{
    //

    public function login(){
        return view('login');
    }

    public function auth(LoginRequest $request){
        
        $credentials = $request->getCredentials();

     
        if(!Auth::validate($credentials)){
            return back()->onlyInput('email')->withErrors(['email' => 'Invalid Credential. Please try again.']);
        }
        
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
    
            return $this->authenticated($request, $user);
        
       
    }

    protected function authenticated(Request $request, $user) 
    {
        return redirect('/view');
    }
    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }



    public function index(){
        $getAll = ModelsAccounts::select('*')->get();
        return view('accounts.index',[
            'record' => $getAll,
        ]);
    }

    public function create(){
        return view('accounts.create');
    }

    public function store(AccountRequest $request){

        try{


        
            $create = ModelsAccounts::create(array_merge($request->validated(),[
                'password' => bcrypt($request['password']),
                'date_created' => Carbon::now(),
            ]));

            return redirect('/accounts')->with('success', 'Account created succcesfully'); 
                
        }
        catch(\Exception $e){
            return $e->getMessage();
        }

    }

}
