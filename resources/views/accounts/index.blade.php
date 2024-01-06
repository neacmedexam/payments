@include('components.header')
<body class=" m-0 p-0 h-screen  bg-[#f9faf9] uppercase flex flex-col justify-center items-center text-[#0d0f0d] ">
    @auth
        <div class=" w-full px-16 py-2 bg-green-600 flex justify-end text-[#f9faf9]">
            {{-- <p class=" px-2 tracking-wider">Hello, <strong>Blabla!</strong></p> --}}
        
                <a href="/logout" class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Sign Out
                </a>
        
        </div>
    @endauth
    <div class=" lg:p-10 h-full w-full">
        
        <div class="w-full p-6  text-[#0d0f0d] rounded-lg ">
            <div class="pb-4 flex flex-row ">
         

                <div class="w-1 bg-yellow-600 block"></div>
            
                <p class="text-4xl pl-2 align-middle w-full h-full">Accounts</p>
            </div>
            <div class="flex min-h-full  py-4 justify-center">
                <div class="overflow-x-auto">
                    <table class=" bg-white shadow-md rounded-xl text-sm">
                        <thead>
                        <tr class="bg-blue-gray-100 text-gray-700">
                    
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Name</th>
                            <th class="py-3 px-4 text-left">Email Address</th>
                            <th class="py-3 px-4 text-left">Department</th>
                            <th class="py-3 px-4 text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-blue-gray-900">
                            @if(!$record->isEmpty())
                                @foreach ($record as $item)
                                @php
                                    $path = url('/storage');
                                    $checkfiles = '';
                                    if($item->payment_slip){
                                        $checkfiles = explode(',',$item->payment_slip);
                                    }
                                @endphp
                            
                                <tr>
                                    <td class="py-3 px-4">{{$item->id}}</td>
                                    <td class="py-3 px-4 whitespace-nowrap">{{$item->name}}</td>
                                    <td class="py-3 px-4">{{$item->email}}</td>
                                    <td class="py-3 px-4">{{$item->user_type == 1 ? 'Finance' : 'Admin'}}</td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('payments.edit',$item->id) }}" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                                    </td>
                                </tr>
                                   
                                @endforeach
                            @else
                                <tr>
                                    <td  colspan="10" class="text-center p-4 font-bold text-xs">No record found.</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                       
           
                </div>
                
            </div>
            <div class="flex justify-center py-2">
                <a href="/accounts/add" class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add New Account
                </a>
            </div>
            
        </div>
    </div>
</body>
</html>