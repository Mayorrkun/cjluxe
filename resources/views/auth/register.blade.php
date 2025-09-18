<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | CjLuxury</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="flex bg-[#000] top-0 sticky z-10 py-[5px]">
    <a href="{{route('home')}}" class="md:ml-auto md:mr-[100px] mx-auto items-center flex gap-[10px]">
        <img src="{{url('images/logo/logo-white.png')}}" alt="" class="h-[25px]">
        <h3 class="fa w-auto logo text-white">CJLUXURY</h3>
    </a>
</nav>

<main class="flex w-full bg-cover " style="background-image: url('images/media/registerbg.jpg')">
    <section class="md:w-1/2 w-full mr-auto bg-black min-h-screen bg-opacity-85 md:bg-opacity-90 py-[30px] px-[20px] sm:px-[40px] flex justify-center">
        <form action="{{route('register')}}" method="POST" class="items-center flex flex-col w-full max-w-[500px]">
            @csrf
            <h1 class="text-white text-[22px] sm:text-[26px] text-center w-full sign-in-header font-[400] mb-[20px]">Register</h1>

            {{-- First Name --}}
            <label class="block text-[14px] leading-[18px] self-start text-white mt-[15px] mb-[5px]" style="font-family: MTNBrighterSans-Light">First Name</label>
            <input name="first_name" class="block w-full bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] px-[15px] py-[8px]" type="text" placeholder="First Name">
            <x-error name="first_name"></x-error>

            {{-- Last Name --}}
            <label class="block text-[14px] leading-[18px] self-start text-white mt-[15px] mb-[5px]" style="font-family: MTNBrighterSans-Light">Last Name</label>
            <input name="last_name" class="block w-full bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] px-[15px] py-[8px]" type="text" placeholder="Last Name">
            <x-error name="last_name"></x-error>

            {{-- Email --}}
            <label class="block text-[14px] leading-[18px] self-start text-white mt-[15px] mb-[5px]" style="font-family: MTNBrighterSans-Light">Email Address</label>
            <input name="email" class="block w-full bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] px-[15px] py-[8px]" type="text" placeholder="Email Address">
            <x-error name="email"></x-error>

            {{-- Password --}}
            <label class="block text-[14px] leading-[18px] self-start text-white mt-[15px] mb-[5px]" style="font-family: MTNBrighterSans-Light">Password</label>
            <input name="password" id="passwordInput" class="block w-full bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] px-[15px] py-[8px]" type="password" placeholder="Password">
            <x-error name="password"></x-error>

            {{-- Confirm Password --}}
            <label class="block text-[14px] leading-[18px] self-start text-white mt-[15px] mb-[5px]" style="font-family: MTNBrighterSans-Light">Confirm Password</label>
            <input name="password_confirmation" class="block w-full bg-transparent border-white rounded-full text-[#ffffff] border text-[18px] px-[15px] py-[8px]" type="password" placeholder="Confirm Password">
            <x-error name="password_confirmation"></x-error>

            {{-- Submit --}}
            <input type="submit" value="Register" class="mt-[20px] bg-[#ffffff] text-[18px] sm:text-[20px] w-full rounded-full py-[10px]" style="font-family: MTNBrighterSans-Medium">

            {{-- Log into Account --}}
            <a href="{{route('login.page')}}" class="text-left w-full text-white text-[14px] sm:text-[16px] hover:text-blue-700 leading-[20.8px] mt-[20px]" style="font-family: MTNBrighterSans-Medium">
                Already have an account? Log In
            </a>
        </form>
    </section>
</main>
</body>
</html>
