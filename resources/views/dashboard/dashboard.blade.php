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
            <div class="w-full h-full  flex flex-col justify-center items-center py-4 px-2">
                <div class="flex flex-row justify-center items-center w-full h-full">
                    <div class="w-full bg-[#ffffff] rounded-md p-4 m-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Total Payments</p>
                        <p class="text-7xl font-medium">{{$payments}}</p>
                    </div>
                    <div class="w-full bg-[#ffffff] rounded-md p-4 m-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Total Verified Payments</p>
                        <p class="text-7xl font-medium">{{$verified}}</p>
                    </div>
                    <div class="w-full bg-[#ffffff] rounded-md p-4 m-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Total Amount Deposited PHP</p>
                        <p class="text-7xl font-medium">₱<span>{{$php}}</span></p>
                    </div>
                    <div class="w-full bg-[#ffffff] rounded-md p-4 m-2 h-[150px] shadow-2xl transition-all duration-300 hover:scale-[1.02]">
                        <p class="text-2xl">Total Amount Deposited USD</p>
                        <p class="text-7xl font-medium">$<span>{{$usd}}</span></p>
                    </div>
                </div>
                <div class="w-full h-full flex   ">
                    <div class="h-full w-3/4  bg-[#ffffff] rounded-md p-4 m-2 shadow-2xl flex justify-center items-center">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="h-full w-1/4 m-2  flex flex-col">
                        <div class="mb-2 p-4  bg-[#ffffff] rounded-md shadow-2xl">
                            <p class="text-2xl pb-2">Employees</p>
                            <table class="table-fixed border">
                                <thead>
                                <tr class="border-b border-black/80"> 
                                     <th class="text-left">Name</th>
                                    <th class="text-left">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                    <td>Malcolm Lockyer</td>
                                </tr>
                                <tr>
                                    <td>Witchy Woman</td>
                                    <td>The Eagles</td>
                                </tr>
                                <tr>
                                    <td>Shining Star</td>
                                    <td>Earth, Wind, and Fire</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bg-[#ffffff] p-4  rounded-md shadow-2xl">
                            <p class="text-2xl pb-2">Mode of Payments</p>
                            <table class="table-fixed border">
                                <thead>
                                <tr class="border-b border-black/80"> 
                                    <th class="text-left">Name</th>
                                    <th class="text-left">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                    <td>Malcolm Lockyer</td>
                                </tr>
                                <tr>
                                    <td>Witchy Woman</td>
                                    <td>The Eagles</td>
                                </tr>
                                <tr>
                                    <td>Shining Star</td>
                                    <td>Earth, Wind, and Fire</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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