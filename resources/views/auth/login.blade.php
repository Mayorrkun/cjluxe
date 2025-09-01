<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | CjLuxury</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="flex bg-[#000] sticky py-[5px]">
    <a href="{{route('home')}}" class=" md:ml-auto md:mr-[100px] mx-auto  items-center flex gap-[10px]">
        <img src="{{url('images/logo/logo-white.png')}}" alt="" class="h-[25px]">
        <h3 class="fa w-auto logo text-white">CJLUXURY</h3>
    </a>
</nav>
<main class="flex w-full">
    <section class="md:w-1/2 ml-auto bg-black h-screen bg-opacity-95 py-[100px] justify-center flex">
        <form action="" class=" items-center flex flex-col">
            @csrf
            <h1 class="text-white text-[26px]  max-w-[300px] px-[100px] sign-in-header font-[400] mb-[30px]">Sign In</h1>

            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">Email Address</label>
            <input name="email" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[20px] md:w-[500px]" type="text" placeholder="Email Address">
            <x-error name="email"></x-error>
            <label style="font-family: MTNBrighterSans-Light" class="block text-[14px] leading-[18px] self-start text-white mt-[20px] mb-[5px]" for="">Password</label>
            <input name="password" id="passwordInput" class="block bg-transparent border-white rounded-full text-[#ffffff] border text-[20px] md:w-[500px]" type="password" placeholder="Password">
            <x-error name="password"></x-error>
            <button style="font-family: MTNBrighterSans-Regular" type="button" class="block w-full text-left text-[16px] mt-[20px] text-[#ffffff]" id="ShowPassword"> <span>Show Password </span><i id="eye" class="fa fa-eye"></i></button>
            <input type="submit" value="Sign In" class="bg-[#ffffff] text-[20px] md:w-[500px] rounded-full" style="font-family: MTNBrighterSans-Medium">


{{--            Forgot password--}}
            <a href="" style="font-family: MTNBrighterSans-Medium" class="text-right w-full text-white text-[16px] hover:text-blue-700 leading-[20.8px] mt-[20px]">Forgot Password ?</a>

{{--            Register Account--}}
            <a href="{{route('register.page')}}" style="font-family: MTNBrighterSans-Medium" class="text-left w-full text-white text-[16px] sign-in-header hover:text-blue-700 leading-[20.8px] mt-[20px]">Dont have an account? Register Now</a>

        </form>
    </section>
</main>

</body>
</html>
