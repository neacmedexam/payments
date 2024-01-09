@include('components.header')
<body class=" m-0 p-0 h-screen  bg-[#ececec] uppercase flex flex-col  items-center text-[#0d0f0d] ">
    <div class=" w-full px-16 py-2 bg-green-600/70 flex justify-end text-[#f9faf9]">
        <a href="/logout" class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Sign Out
        </a>
    </div>
    
    <div class=" lg:p-10 h-full w-full">
        
        <div class="w-full px-6  text-[#0d0f0d] rounded-lg ">
            <div class="pb-4 flex flex-row ">
         

                <div class="w-1 bg-blue-600 "></div>
                <div class="">

                    <p class="text-4xl pl-2 align-middle w-full h-full">View Payment - {{$record->id}}</p>
                </div>
            </div>
            @if(session()->has('success'))
            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <!--<strong class="font-bold">Holy smokes!</strong>-->
            <span class="block sm:inline">{{ session()->get('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert()">
                <svg onclick="closeAlert()" class="fill-current h-6 w-6 text-black/60" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
            </div>
        @endif
            <div class="w-full h-full p-4 flex justify-center items-center">
               
                <div class="w-full sm:max-w-[50%] bg-[#ffffff] rounded shadow-lg p-4">
                    <form class="flex flex-col sm:flex-row justify-center" action="{{route('payments.update',$record->id)}}" method="POST">
                        @csrf
                        @method("PUT")

                    
                        <div class="w-full sm:border-r-2">
                            <div class="w-full mb-2 flex flex-col justify-evenly items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="date_created">
                                    Date Posted
                                </label>
                                <input disabled name="date_created" value="{{ \Carbon\Carbon::parse( $record->date_created)->isoFormat('MMMM DD YYYY, h:mm a')}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="date_created" type="text" >
                           
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="name">
                                    Name
                                </label>
                                <input disabled name="name" value="{{$record->name}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Juan Dela Cruz Jr.">
                            
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input disabled name="email" value="{{$record->email}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="sample@email.com">
                                
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="facebook">
                                    Facebook
                                </label>
                                <input disabled name="facebook" value="{{$record->facebook}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text">
                              
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="contact_number">
                                    Contact Number
                                </label>
                                <input disabled name="contact_number" value="{{$record->contact_number}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text">
                            
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="service_availed">
                                    Service Availed
                                </label>
                                <input disabled name="service_availed" value="{{$record->service_availed}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text">
                              
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="mode_of_payment">
                                    Mode of Payment
                                </label>
                                <input disabled name="mode_of_payment" value="{{$record->mode_of_payment}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text">
                            
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="other_mop">
                                    Other Mode of Payment
                                </label>
                                <input disabled name="other_mop" value="{{$record->other_mop}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text">
                             
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="total_amount_paid">
                                    Total Amount Paid
                                </label>
                                <input disabled name="total_amount_paid" value="{{$record->total_amount_paid}}" class="disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text">
                            
                                </div>
                            </div>
                            <div class="w-full mb-2 flex flex-col justify-between items-center">
                                <div class="w-full pr-2 pb-2">
                                <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                    Payment Slip
                                </label>
                                    @php
                                        $path = url('/storage');
                                        $checkfiles = '';
                                        if($record->payment_slip){
                                            $checkfiles = explode(',',$record->payment_slip);
                                        }
                                    @endphp
                                    <ul class="list-decimal px-4 text-xs font-bold"> 
                                    @if($checkfiles)
                                        @foreach($checkfiles as $file)
                                            @php
                                                $files = str_replace("/uploads","",$file);
                                                $shortenfilename = str_replace("upload/","",$files);
                                            @endphp
                                            <li class=>
                                                <a href="{{$path.'/'.$files}}" class="text-xs font-medium text-blue-600 hover:text-blue-800" target="_blank" rel="noopener">{{$shortenfilename}}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                
                                </div>
                            </div>
                        </div>
                        <div class="w-full sm:pl-2">
                            <div class="w-full">
                                <div class="w-full mb-2 flex flex-col justify-between items-center">
                                    <div class="w-full pr-2 pb-2">
                                    <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                        Date Verified<span class="text-xs text-red-600">*</span>
                                    </label>
                                    <input name="date_verified" value="{{$record->date_verified}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="datetime-local" >
                              
                                    </div>
                                </div>
                                <div class="w-full mb-2 flex flex-col justify-between items-center">
                                    <div class="w-full pr-2 pb-2">
                                    <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                        Amount Deposited (PHP)<span class="text-xs text-red-600">*</span>
                                    </label>
                                    <input name="amount_deposited_php" value="{{$record->amount_deposited_php}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="1234.56">
                                
                                    </div>
                                </div>
                                <div class="w-full mb-2 flex flex-col justify-between items-center">
                                    <div class="w-full pr-2 pb-2">
                                    <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                        Amount Deposited (USD)<span class="text-xs text-red-600">*</span>
                                    </label>
                                    <input name="amount_deposited_usd" value="{{$record->amount_deposited_usd}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="1234.56">
                                 
                                    </div>
                                </div>
                                <div class="w-full mb-2 flex flex-col justify-between items-center">
                                    <div class="w-full pr-2 pb-2">
                                    <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                        Date Updated - Admin<span class="text-xs text-red-600">*</span>
                                    </label>
                                    <input name="date_update_admin" value="{{ $record->date_update_admin ? \Carbon\Carbon::parse($record->date_update_admin)->format('Y-m-d') : ''}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline"  type="date">
                                  
                                    </div>
                                </div>
                                <div class="w-full mb-2 flex flex-col justify-between items-center">
                                    <div class="w-full pr-2 pb-2">
                                    <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                                        Verified By<span class="text-xs text-red-600">*</span>
                                    </label>
                                    <input readonly name="verified_by" value="{{$record->verified_by ? $record->verified_by : ""}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" type="email">
                                 
                                    </div>
                                </div>
                                <div class="w-full mb-2 flex flex-col justify-between items-center">
                                    <div class="w-full pr-2 pb-2">
                                    <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="remarks">
                                        Remarks<span class="text-xs text-red-600">*</span>
                                    </label>
                                    <textarea cols="20" rows="10" name="remarks" class="text-sm shadow-lg appearance-none border rounded w-full p-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline">{{$record->remarks}}</textarea>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 pr-2 flex justify-end  ">
                    
                                <button class="text-xs uppercase tracking-wide font-bold p-2 px-4 border bg-[#016e0e] hover:bg-green-700  text-white rounded" type="submit" style="cursor:pointer;">Update</button>
                                <a href="/payment/view" class="text-xs uppercase tracking-wide font-bold p-2 px-4 border bg-red-700 hover:bg-red-800  text-white rounded"   style="cursor:pointer;">Back</a>
                            
                            </div>
                        </div>
                       
                    </form>
                </div>
                
            </div>
           
      
        </div>
    </div>
</body>
</html>