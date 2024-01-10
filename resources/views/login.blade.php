@include('components.header')
<body class=" m-0 p-0 h-screen  bg-[#f9faf9] uppercase flex flex-col justify-center items-center text-[#0d0f0d] ">
    @auth
        <div class=" w-full px-16 py-2 bg-green-600/70 flex justify-end text-[#f9faf9]">
            {{-- <p class=" px-2 tracking-wider">Hello, <strong>Blabla!</strong></p> --}}
            <a href="/logout" class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Sign Out
            </a>
        </div>
    @endauth
    
    <div class=" lg:p-10 h-full w-full">
        
        <div class="w-full h-full p-6  text-[#0d0f0d] rounded-lg ">
          
            <div class="w-full h-full p-4 flex justify-center items-center">
                <div class="w-full sm:max-w-[30%] bg-black/10 rounded shadow-lg p-4 px-8">
                    <form action="{{route('login.auth')}}" method="POST">
                        @csrf
                        @if(session()->has('success'))
                            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <!--<strong class="font-bold">Holy smokes!</strong>-->
                            <span class="block sm:inline">{{ session()->get('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert()">
                                <svg onclick="closeAlert()" class="fill-current h-6 w-6 text-black/60" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                            </div>
                        @endif
                        <p class="text-2xl py-4 text-center font-bold">Login</p>
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
                        <div class="w-full mb-2 flex flex-col justify-between items-center">
                            <div class="w-full pr-2 pb-2">
                            <label class="block text-[#0d0f0d] text-sm font-bold mb-2" for="password">
                                Password<span class="text-xs text-red-600">*</span>
                            </label>
                            <input name="password" value="{{old('password')}}" class="text-sm shadow-lg appearance-none border rounded w-full py-2 px-3 text-[#0d0f0d] leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******">
                            @error('password')
                                <p class="text-red-600 text-xs whitespace-nowrap">{{$message}}</p>
                            @enderror
                            </div>
                        </div>
                
                    
                        <div class="pt-2 pr-2 flex justify-end  ">
                    
                            <input class="text-xs uppercase tracking-wide font-bold p-2 px-4 border bg-[#01599D] hover:bg-[#01599dc9]  text-white rounded" type="submit" name="paymentprocess" value="Login" style="cursor:pointer;">
                          </div>
                    </form>
                </div>
                
            </div>
           
      
        </div>
    </div>
</body>
</html>