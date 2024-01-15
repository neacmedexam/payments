<div class="table-data">
    
    <table id="payments_table" class="table display user_datatable bg-white shadow-md rounded-xl text-sm">
        <thead>
        <tr class="bg-blue-gray-100 text-gray-700 text-xs">

            <th class="py-3 px-4 text-left">Date</th>
            <th class="py-3 px-4 text-left">Reference Number</th>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Email Address</th>
            <th class="py-3 px-4 text-left">Contact Number</th>
            <th class="py-3 px-4 text-left">Service Availed</th>
            <th class="py-3 px-4 text-left">Mode of Payment</th>
            <th class="py-3 px-4 text-left">Other Mode of Payment</th>
            <th class="py-3 px-4 text-left">Total Amount Paid</th>
            <th class="py-3 px-4 text-left">Payment Slip</th>
            <th class="py-3 px-4 text-left">Verified</th>
            <th class="py-3 px-4 text-left">Verified By</th>
            <th class="py-3 px-4">Action</th>
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
                    <td class="py-3 px-4">{{$item->service_availed}}</td>
                    <td class="py-3 px-4">{{$item->mode_of_payment}}</td>
                    <td class="py-3 px-4">{{$item->other_mop}}</td>
                    <td class="py-3 px-4">{{$item->total_amount_paid}}</td>
                    <td class="py-3 px-4">
                        @if($checkfiles)
                            @foreach($checkfiles as $file)
                                @php
                                    $files = str_replace("/uploads","",$file);
                                    $shortenfilename = str_replace("upload/","",$files);
                                @endphp
                                <a href="{{$path.'/'.$files}}" class="font-medium text-[#01599D] hover:text-blue-800" target="_blank" rel="noopener">{{$shortenfilename}}</a>
                            @endforeach
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        <input type="checkbox" name="" id="" {{$item->payment_verified == 1 ? 'checked' : ''}} class="{{$item->payment_verified == 1 ? 'accent-[#01599D]' : ''}}" >
                    </td>
                    <td class="py-3 px-4 font-medium">{{$item->verified_by}}</td>
                    <td class="py-3 px-4 w-full">
                        <a href="{{ route('payments.edit',$item->id) }}" class="font-medium text-[#01599D] hover:text-blue-800 flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                            
                        </a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td  colspan="99" class="text-center p-4 font-bold text-xs">No record found.</td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
<script>
    
        $(document).on('keyup',function(e){
            e.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url: "{{route('payments.search')}}",
                method: 'GET',
                data:{search_string:search_string},
                success:function(res){
        
                    $('.table-data').html(res);
                }
            })
        })
    
  
</script>