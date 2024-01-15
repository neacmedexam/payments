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
                <li>
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-900 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <p class="ms-1 text-sm font-medium text-gray-900  md:ms-2 ">Payments</p>
                    </div>
                </li>
                {{-- <li aria-current="page">
                    <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Records</span>
                    </div>
                </li> --}}
                </ol>
            </nav>
  
            <div class="pb-4 flex flex-row ">
         

                <div class="w-1 bg-[#01599D] block"></div>
            
                <p class="text-4xl pl-2 align-middle w-full h-full">Payment Record</p>
            </div>
            <div class="flex flex-col h-full  justify-center ">
                <div class="flex justify-end items-center">
                    <p class="px-2 font-medium ">Search:</p>
                    <input class="p-2 py-1" type="text" name="search" id="search"  placeholder="search here..">
                </div>
                <div class="overflow-x-auto py-4 h-full">
                    <div class="table-data">
                       @include('payments.table')
                    </div>
                    
           
                </div>
             
            </div>
            <div class="py-4">
                {{ $record->appends(request()->all())->links() }}
            </div>
        </div>
      
    </div>
</body>


</html>