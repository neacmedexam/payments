<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ URL::asset('/image/icon.png') }}" type="image/x-icon"/>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <title>NEAC Payments</title>
</head>
<body class=" m-0 p-0 h-screen w-screen bg-[#f9faf9] uppercase flex flex-col justify-center items-center text-[#0d0f0d] ">
  <div class=" lg:p-10 h-full w-full lg:max-w-[65%]  ">
    <div class="w-full p-6 flex flex-col md:flex-row justify-center    text-[#0d0f0d] rounded-lg">
      <div class="p-4 w-full h-full">
        <div class="">
          <p class="font-bold tracking-wider text-5xl sm:text-7xl  text-[#0d0f0d]">NEAC Payments</p>
        </div>
        <div class="">
          <p class="pt-2 text-justify text-[10px] sm:text-xs">
            <span class="font-bold">IMPORTANT NOTE:</span> 
            <span class="">If you have any complaints or concerns, please report to <a href="mailto:feedback@applynclex.com" class="text-blue-600 font-bold">feedback@applynclex.com</a> or call our office at <strong>+63 (02) 3485-0853.</strong> Please do not transact with any NEAC officer or person outside NEAC offices. Do not deposit your fees to a bank account other than NEAC bank accounts, which have <strong>'NEAC MEDICAL EXAMS APPLICATION CENTER, INC.'</strong> as the bank account name. NEAC has no control on changes in certain states’ application fees and requirements. If any state changes its requirements or/and fees during the processing of applications, these changes may affect your applications in the pipeline, and switching to another state may be needed and applicable additional fees apply.</span>
          </p>
        </div>
      </div>
      <div class="p-8 sm:px-10 w-full bg-[#96bf91] shadow-xl border=[#96bf91] rounded-2xl text-[#0d0f0d]">
        <form method="POST" action="{{route('payments.store')}}" enctype="multipart/form-data" >
          @csrf
          
          @if(session()->has('success'))
            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
              <!--<strong class="font-bold">Holy smokes!</strong>-->
              <span class="block sm:inline">{{ session()->get('success') }}</span>
              <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert()">
                <svg onclick="closeAlert()" class="fill-current h-6 w-6 text-black/60" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
          @elseif(session()->has('failed'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <span class="block sm:inline">{{ session()->get('failed') }}</span>
              <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
              </span>
            </div>
          @endif  
          <div class="pb-4">
            <p class=" font-bold tracking-wide text-xl sm:text-2xl  text-[#101310]  text-center">KINDLY SUBMIT YOUR PAYMENT HERE</p>
          </div>
          <div class="w-full mb-2 flex flex-col justify-between items-center">
            <div class="w-full pr-2 pb-2">
              <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                  Email<span class="text-xs text-red-600">*</span>
              </label>
              <input name="email" value="{{old('email')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="sample@email.com">
              @error('email')
                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="flex flex-col sm:flex-row justify-between items-center mb-2 w-full">
            <div class="w-full pr-2">
              <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                  Full Name<span class="text-xs text-red-600">*</span>
              </label>
              <input name="name"  value="{{old('name')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="fullname" type="text" placeholder="Juan Dela Cruz Jr.">
              @error('name')
                <p class="text-red-600 text-xs whitespace-nowrap ">{{$message}}</p>
              @enderror
            </div>
            <div class="w-full pr-2 pt-2 sm:pt-0">
              <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="facebook">
                  Facebook<span class="text-xs text-red-600">*</span>
              </label>
              <input name="facebook"  value="{{old('facebook')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="facebook" type="text" placeholder="Juan Dela Cruz">
              @error('facebook')
                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
              @enderror
            </div>
            
          </div>
          <div class="w-full mb-2 flex flex-col justify-between items-center">
            <div class="w-full pr-2 mb-2">
              <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                  Contact Number<span class="text-xs text-red-600">*</span>
              </label>
              <input name="contact_number"  value="{{old('contact_number')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="09xxxxxxxxx">
              @error('contact_number')
                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="w-full mb-2 flex flex-col justify-between items-center">
            <div class="w-full pr-2 mb-2">
              <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="email">
                  Service Availed<span class="text-xs text-red-600">*</span>
              </label>
              <input name="service_availed" value="{{old('service_availed')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="eg. NCLEX">
              @error('service_availed')
                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="w-full mb-2">
            <label class="block uppercase tracking-wide text-[#0d0f0d] text-sm font-bold mb-2" for="mode_of_payment">
              Mode of Payment<span class="text-xs text-red-600">*</span>
            </label>
            <div class="relative pr-2">
              <select name="mode_of_payment" onChange="check(this);" class="text-sm block shadow-lg w-full bg-gray-100 border border-gray-200 text-[#0d0f0d] py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="mySelect">
                <option value="BDO" selected {{old('mode_of_payment') == 'BDO' ? 'selected' : ''}}>BDO</option>
                <option value="Debit Card/Credit Card" {{old('mode_of_payment') == 'Debit Card/Credit Card' ? 'selected' : ''}}>Debit Card/Credit Card</option>
                <option value="Remittance" {{old('mode_of_payment') == 'Remittance' ? 'selected' : ''}}>Remittance</option>
                <option value="Dragon Pay" {{old('mode_of_payment') == 'Dragon Pay' ? 'selected' : ''}}>Dragon Pay</option>
                <option value="Others" {{old('mode_of_payment') == 'Others' ? 'selected' : ''}}>Others</option>
              </select>
              <div id="other-div" style="display:none;" class="pt-2" >
                <label class="block uppercase tracking-wide text-[#0d0f0d] text-xs font-bold mb-2">Please Specify:
                <input name="other_mop" id="other_mop" type="text" class="text-sm shadow-lg appearance-none border rounded py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline"/>
                </label>
              </div>
              @error('mode_of_payment')
                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
              @enderror
          
            </div>
          </div>
          <div class="w-full mb-2 flex flex-col justify-between items-center">
            <div class="w-full pr-2 mb-2">
              <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="total_amount_paid">
                  Total Amount Paid<span class="text-xs text-red-600">*</span>
              </label>
              <input name="total_amount_paid" value="{{old('total_amount_paid')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="1234.56">
              @error('total_amount_paid')
                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
              @enderror
            </div>
          </div>
          <div class="text-sm pr-2">
                
            <label class="block text-[#0d0f0d] text-sm font-bold" for="file_input">Upload the Payment Slip<span class="text-xs text-red-600">*</span>
    
            </label>
            <input name="payment_slip" class="py-2 px-3 block w-full text-sm text-[#0d0f0d] border shadow-lg border-gray-300 rounded cursor-pointer bg-gray-50 "  aria-describedby="file_input_help" id="file_input" type="file">
            <p class="block text-[#0d0f0d] text-[10px] font-bold mb-2" id="file_input_help">PNG, JPG, JPEG, HEIC, or PDF</p>
            @error('payment_slip')
              <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
            @enderror   
          </div>
          <div class="py-2 flex flex-col justify-center items-center w-full">
            
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            
    
    
            @if ($errors->has('g-recaptcha-response'))
              <p class="text-red-600 text-xs whitespace-nowrap">{{ $errors->first('g-recaptcha-response') }}</p>
              
            @endif
          </div>
          <div class="pt-2 flex justify-end ">
            {{-- <button class="p-2 px-4 border bg-green-600 border-green-600 text-white rounded">Submit</button> --}}      
            {{-- {!! RecaptchaV3::field('paymentprocess') !!}
    
            @error('paymentprocess')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror --}}
    
            <input class="text-xs tracking-wide font-bold p-2 px-4 border bg-[#016e0e] border-[#016e0e] text-white rounded" type="submit" name="paymentprocess" value="SUBMIT" style="cursor:pointer;">
          </div>
          </form>
      </div>
      
    </div>
  </div>
  <script>
    // Put this script in header or above select element
        function check(elem) {
            // use one of possible conditions
            // if (elem.value == 'Other')
            if (elem.selectedIndex == 4) {
                document.getElementById("other-div").style.display = 'block';
            } else {
                document.getElementById("other-div").style.display = 'none';
            }
        }
    </script>
</body>
</html>