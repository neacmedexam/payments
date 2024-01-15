@include('components.header')

<body class=" m-0 p-0 h-screen  bg-[#ececec] uppercase flex flex-col  items-center text-[#0d0f0d] ">
    @include('components.nav')
    
    <div class=" lg:p-10 h-full w-full">
        
        <div class="w-full p-6 sm:px-6 sm:py-0  text-[#0d0f0d] rounded-lg ">
            

            <nav class="flex pb-2 pl-4" aria-label="Breadcrumb">
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
                    <p class="ms-1 text-sm font-medium text-gray-900  md:ms-2 ">Dashboard</p>
                    </div>
                </li>
                </ol>
            </nav>
  
            <div class="pb-4 flex flex-row ">
         
                <div class="w-full ">
                    <div class="w-1 bg-[#01599D] block"></div>
                
                    <p class="text-4xl pl-2 align-middle w-full h-full">Payment Dashboard</p>

                </div>
                
            </div>
            <div class="w-full h-full  flex flex-col justify-center items-center py-4 px-2">
                <div class="flex justify-end w-full px-2 ">
                    <select name="mode_of_payment" onChange="check(this);" class="text-sm block shadow-lg bg-[#ffffff] border border-gray-200 text-[#0d0f0d] py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white " id="mySelect">
                        <option value="2024" selected {{old('mode_of_payment') == '2024' ? 'selected' : ''}}>2024</option>
                      </select>
                </div>
                <div class="flex flex-row justify-center items-center w-full h-full p-2">
                    <div class="w-full bg-[#ffffff] rounded-md p-4 mx-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Payments</p>
                        <p class="text-6xl font-medium text-center">{{$payments}}</p>
                    </div>
                    <div class="w-full bg-[#ffffff] rounded-md p-4 mx-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Verified Payments</p>
                        <p class="text-6xl font-medium text-center">{{$verified}}</p>
                    </div>
                    <div class="w-full bg-[#ffffff] rounded-md p-4 mx-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Total Amount Deposited PHP</p>
                        <p class="text-6xl font-medium text-center">₱<span>{{$php}}</span></p>
                    </div>
                    <div class="w-full bg-[#ffffff] rounded-md p-4 mx-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Total Amount Deposited USD</p>
                        <p class="text-6xl font-medium text-center">$<span>{{$usd}}</span></p>
                    </div>
                </div>
                <div class="w-full h-full flex flex-col justify-center sm:flex-row px-2">
                    <div class=" mx-2 h-full  w-[75.5%] bg-[#ffffff] rounded-md shadow-2xl flex flex-col justify-center ">
                        
                        <div class="h-full w-full p-4">
                            <canvas id="myChart"></canvas>

                        </div>
                    </div>
                    <div class=" mx-2 h-full  w-[24.5%] flex flex-col justify-evenly  ">
                        <div class=" p-4  bg-[#ffffff] rounded-md shadow-2xl h-full">
                         
                            <p class="text-2xl pb-2">Employees</p>
                            <table class="table-fixed border w-full p-2">
                                <thead>
                                <tr class="border-b border-black/80 p-2"> 
                                    <th class="text-left p-2">Name</th>
                                    <th class="text-center p-2">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $list)
                                        <tr class="p-2">
                                            <td class="px-2">{{$list->verified_by}}</td>
                                            <td class="text-center px-2">{{$list->count}}</td>
                                        </tr>
                                    @endforeach
                        
                                </tbody>
                            </table>
                         
                            
                        </div>
                        <div class="bg-[#ffffff] p-4  rounded-md shadow-2xl  my-2 h-full">
                            <p class="text-2xl pb-2">Mode of Payments</p>
                            <table class="table-auto border w-full h-full overflow-scroll ">
                                <thead>
                                <tr class="border-b border-black/80 p-2"> 
                                    <th class="text-left p-2">Name</th>
                                    <th class="text-center p-2">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mode_of_payment as $mop)
                                        <tr class="p-2">
                                            <td class="p-2">{{$mop->mode_of_payment}}</td>
                                            <td class="text-center p-2">{{$mop->count}}</td>
                                        </tr>
                                    @endforeach
                        
                                </tbody>
                            </table>
                           
                        </div>
                        {{-- <div class="bg-[#ffffff] p-4  rounded-md shadow-2xl h-full">
                            <p class="text-2xl pb-2">Mode of Payments</p>
                            
                           
                        </div> --}}
                    </div>
                </div>
            </div>
           
         
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const data = @json($data);
        const options = @json($options);
        const chart = new Chart(document.getElementById('myChart'), {
            type: 'bar',
            data: data,
            options: options,
        });



    </script>
</body>
</html>