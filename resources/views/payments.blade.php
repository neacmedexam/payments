<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>NEAC Payments</title>
</head>
<body class=" m-0 p-0 h-screen w-screen bg-[#e9f3e3] uppercase flex flex-col justify-center items-center ">
  <div class="p-10 h-full w-full lg:max-w-[65%]  ">
    <form method="POST" action="{{route('payments.store')}}" class="p-4 h-full w-full bg-[#86A789]/70 text-[#2f3238] rounded-xl">
      @csrf
      <div>
        <p class="font-bold tracking-wide text-4xl text-[#ececec]">NEAC Payments</p>
      <div>
      <div class="mb-2">
        <p class="pt-2 font-bold text-xl">KINDLY SUBMIT YOUR PAYMENT HERE</p>
        <p class="pt-4 text-justify text-sm">
          <span class="font-bold">IMPORTANT NOTE:</span> 
          <span class="">If you have any complaints or concerns, please report to <a href="mailto:feedback@applynclex.com" class="text-blue-600 font-bold">feedback@applynclex.com</a> or call our office at +63 (02) 3485-0853. Please do not transact with any NEAC officer or person outside NEAC offices. Do not deposit your fees to a bank account other than NEAC bank accounts, which have 'NEAC MEDICAL EXAMS APPLICATION CENTER, INC.' as the bank account name. NEAC has no control on changes in certain states’ application fees and requirements. If any state changes its requirements or/and fees during the processing of applications, these changes may affect your applications in the pipeline, and switching to another state may be needed and applicable additional fees apply.</span>
        </p>
      </div>
      <div class="w-full mb-2 flex flex-col justify-between items-center">
        <div class="w-full pr-2 mb-2">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email<span class="text-xs text-red-600">*</span>
          </label>
          <input name="email" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="sample@email.com">
        </div>
      </div>
      <div class="flex flex-row justify-between items-center mb-2 w-full">
        <div class="w-full pr-2">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Full Name<span class="text-xs text-red-600">*</span>
          </label>
          <input name="name" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fullname" type="text" placeholder="Juan Dela Cruz Jr.">
        
        </div>
        <div class="w-full">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="facebook">
              Facebook<span class="text-xs text-red-600">*</span>
          </label>
          <input name="facebook" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="facebook" type="text" placeholder="Juan Dela Cruz">
        
        </div>
        
      </div>
      <div class="w-full mb-2 flex flex-col justify-between items-center">
        <div class="w-full pr-2 mb-2">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Contact Number<span class="text-xs text-red-600">*</span>
          </label>
          <input name="contact_number" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="09xxxxxxxxx">
        </div>
      </div>
      <div class="w-full mb-2 flex flex-col justify-between items-center">
        <div class="w-full pr-2 mb-2">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Service Availed<span class="text-xs text-red-600">*</span>
          </label>
          <input name="service_availed" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="eg. NCLEX">
        </div>
      </div>
      <div class="w-full mb-2">
        <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="mode_of_payment">
          Mode of Payment<span class="text-xs text-red-600">*</span>
        </label>
        <div class="relative">
          <select name="mode_of_payment" onChange="check(this);" class="text-sm block  w-full bg-gray-100 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="mySelect">
            <option value="BDO" selected>BDO</option>
            <option value="Debit Card/Credit Card">Debit Card/Credit Card</option>
            <option value="Remittance">Remittance</option>
            <option value="Dragon Pay">Dragon Pay</option>
            <option >Other</option>
          </select>
          <div id="other-div" style="display:none;" class="pt-2" >
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Please Specify:
            <input name="mode_of_payment" id="other-input" type="text" class="text-sm shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
            </label>
          </div>
      
        </div>
      </div>
      <div class="w-full mb-2 flex flex-col justify-between items-center">
        <div class="w-full pr-2 mb-2">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="total_amount_paid">
              Total Amount Paid<span class="text-xs text-red-600">*</span>
          </label>
          <input name="total_amount_paid" class="text-sm shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="1234.56">
        </div>
      </div>
      <div class="text-sm">
            
        <label class="block text-gray-700 text-sm font-bold" for="file_input">Upload the Payment Slip<span class="text-xs text-red-600">*</span>

        </label>
        <input name="payment_slip" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 "  aria-describedby="file_input_help" id="file_input" type="file">
        <p class="block text-gray-700 text-xs font-bold mb-2" id="file_input_help">PNG, JPG, JPEG, HEIC, or PDF</p>

      </div>
      <div class="pt-2 flex justify-end">
        <button class="p-2 px-4 border bg-green-600 border-green-600 text-white rounded">Submit</button>
      </div>
    </form>
    
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