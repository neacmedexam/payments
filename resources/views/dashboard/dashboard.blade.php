@include('components.header')

<body class=" m-0 p-0 h-screen  bg-[#ececec] uppercase flex flex-col  items-center text-[#0d0f0d] ">
    @include('components.nav')
    
    <div class=" lg:p-10 h-full w-full">
        
        <div class="w-full p-6 sm:px-6 sm:py-0  text-[#0d0f0d] rounded-lg ">
            

            <nav class="flex pb-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <p class="inline-flex items-center text-sm font-medium text-gray-900  ">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Home
                    </p>
                </li>
               
                </ol>
            </nav>
  
            <div class="pb-4 flex flex-row ">
         

                <div class="w-1 bg-[#01599D] block"></div>
            
                <p class="text-4xl pl-2 align-middle w-full h-full">Payment Dashboard</p>
            </div>
            <div class="w-full h-full bg-slate-200 flex flex-col justify-center items-center p-4">
                <div class="flex flex-row justify-center items-center w-full h-full">
                    <div class="w-full bg-red-600 p-4 m-2 h-full">
                        <p>Total Payments</p>
                    </div>
                    <div class="w-full bg-blue-600 p-4 m-2 h-full">
                        <p>Total Verified Payments</p>
                    </div>
                    <div class="w-full bg-green-600 p-4 m-2 h-full">
                        <p>Total Amount Deposited PHP</p>
                    </div>
                    <div class="w-full bg-amber-600 p-4 m-2 h-full">
                        <p>Total Amount Deposited USD</p>
                    </div>
                </div>
                <div class="h-full">
                    <div class="m-2">
                        <p>Chart here</p>
                    </div>
                </div>
            </div>
           
         
        </div>
    </div>
</body>
</html>