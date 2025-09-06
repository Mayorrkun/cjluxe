<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | CjLuxury</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="flex bg-[#000] top-0 sticky z-10 py-[5px]">
    <a href="{{route('home')}}" class=" md:ml-auto md:mr-[100px] mx-auto  items-center flex gap-[10px]">
        <img src="{{url('images/logo/logo-white.png')}}" alt="" class="h-[25px]">
        <h3 class="fa w-auto logo text-white">CJLUXURY</h3>
    </a>
</nav>
<main class="flex w-full">
    <section class="md:w-1/2 mr-auto bg-black h-screen bg-opacity-95 py-[10px] justify-center flex">
        <form action="{{route('register')}}" method="POST" class="items-center flex flex-col">
            @csrf
            <h1 class="text-white text-[26px]  max-w-[300px] px-[100px] sign-in-header font-[400] mb-[20px]">Register</h1>

            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">First Name</label>
            <input name="first_name" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] md:w-[500px]" type="text" placeholder="First Name">
            <x-error name="first_name"></x-error>

            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">Last Name</label>
            <input name="last_name" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] md:w-[500px]" type="text" placeholder="Last Name">
            <x-error name="last_name"></x-error>


            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">Email Address</label>
            <input name="email" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] md:w-[500px]" type="text" placeholder="Email Address">
            <x-error name="email"></x-error>
            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">Password</label>
            <input name="password" id="passwordInput" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] md:w-[500px]" type="password" placeholder="Password">
            <x-error name="password"></x-error>

            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">Confirm Password</label>
            <input name="password_confirmation" id="passwordInput" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] md:w-[500px]" type="password" placeholder="Password">
            <x-error name="password_confirmation"></x-error>

            <input type="submit" value="Register" class=" mt-[20px] bg-[#ffffff] text-[20px] md:w-[500px] rounded-full" style="font-family: MTNBrighterSans-Medium">
            {{--        Log into Account--}}
            <a href="{{route('login.page')}}" style="font-family: MTNBrighterSans-Medium" class="text-left w-full text-white text-[16px] sign-in-header hover:text-blue-700 leading-[20.8px] mt-[20px]">Already have an account? Log In</a>

        </form>
    </section>
</main>

</body>
</html>
