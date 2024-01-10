@include('components.header')
<body class=" m-0 p-0 h-screen  bg-[#ececec] uppercase flex flex-col  items-center text-[#0d0f0d] ">
    @include('components.nav')
    
    <div class=" lg:p-10 h-full w-full">
        
        <div class="w-full p-6  text-[#0d0f0d] rounded-lg ">
            <div class="pb-4 flex flex-row ">
         

                <div class="w-1 bg-green-600 block"></div>
            
                <p class="text-4xl pl-2 align-middle w-full h-full">Payment Record</p>
            </div>
            <div class="flex min-h-full  justify-center ">
                <div class="overflow-x-auto shadow-lg">
                    <table class=" bg-white shadow-md rounded-xl text-sm">
                        <thead>
                        <tr class="bg-blue-gray-100 text-gray-700 text-xs">
                    
                            <th class="py-3 px-4 text-left">Date</th>
                            <th class="py-3 px-4 text-left">Reference Number</th>
                            <th class="py-3 px-4 text-left">Name</th>
                            <th class="py-3 px-4 text-left">Email Address</th>
                            <th class="py-3 px-4 text-left">Contact Number</th>
                            <th class="py-3 px-4 text-left">Mode of Payment</th>
                            <th class="py-3 px-4 text-left">Other Mode of Payment</th>
                            <th class="py-3 px-4 text-left">Total Amount Paid</th>
                            <th class="py-3 px-4 text-left">Payment Slip</th>
                            <th class="py-3 px-4 text-left">Verified</th>
                            <th class="py-3 px-4 text-left">Verified By</th>
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
                                    <td class="py-3 px-4 whitespace-nowrap">{{ Carbon\Carbon::parse($item->date_created)->toFormattedDateString()}}</td>
                                    <td class="py-3 px-4 font-medium">{{$item->reference}}</td>
                                    <td class="py-3 px-4 whitespace-nowrap">{{$item->name}}</td>
                                    <td class="py-3 px-4">{{$item->email}}</td>
                                    <td class="py-3 px-4">{{$item->contact_number}}</td>
                                    <td class="py-3 px-4">{{$item->mode_of_payment}}</td>
                                    <td class="py-3 px-4">{{$item->other_mop}}</td>
                                    <td class="py-3 px-4">{{$item->total_amount_paid}}</td>
                                    <td class="py-3 px-4 whitespace-pre-line">
                                        @if($checkfiles)
                                            @foreach($checkfiles as $file)
                                                @php
                                                    $files = str_replace("/uploads","",$file);
                                                    $shortenfilename = str_replace("upload/","",$files);
                                                @endphp
                                                <a href="{{$path.'/'.$files}}" class="font-medium text-blue-600 hover:text-blue-800" target="_blank" rel="noopener">{{$shortenfilename}}</a>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <input type="checkbox" name="" id="" disabled {{$item->payment_verified == 1 ? 'checked' : ''}} >
                                    </td>
                                    <td class="py-3 px-4 font-medium">{{$item->verified_by}}</td>
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
            <div class="py-4">
                {{ $record->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
</body>
</html>