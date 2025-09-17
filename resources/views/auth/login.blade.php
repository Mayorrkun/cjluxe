<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | CjLuxury</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cover" style="background-image: url('images/media/loginbg.jpg')">
<!-- Navbar -->
<nav class="flex bg-[#000] sticky py-[5px] px-4">
    <a href="{{route('home')}}"
       class="md:ml-auto md:mr-[100px] mx-auto items-center flex gap-[10px]">
        <img src="{{url('images/logo/logo-white.png')}}" alt="" class="h-[25px]">
        <h3 class="fa w-auto logo text-white text-[18px] sm:text-[20px]">CJLUXURY</h3>
    </a>
</nav>

<!-- Main -->
<main class="flex w-full">
    <section class="w-full md:w-1/2 ml-auto bg-black h-screen bg-opacity-80 py-[60px] sm:py-[100px] flex justify-center px-4 sm:px-0">
        <form action="{{route('login')}}" method="POST" class="flex flex-col w-full max-w-[500px]">
            @csrf

            <!-- Heading -->
            <h1 class="text-white text-[22px] sm:text-[26px] sign-in-header font-[400] mb-[30px] text-center sm:text-left">
                Sign In
            </h1>

            <!-- Email -->
            <label for="email" class="block text-[14px] leading-[18px] text-white mt-[20px] mb-[5px]">
                Email Address
            </label>
            <input name="email"
                   class="block w-full bg-transparent border-white rounded-full text-white border text-[16px] sm:text-[20px] px-4 py-2"
                   type="text" placeholder="Email Address">
            <x-error name="email"></x-error>

            <!-- Password -->
            <label for="passwordInput" class="block text-[14px] leading-[18px] text-white mt-[20px] mb-[5px]">
                Password
            </label>
            <input name="password" id="passwordInput"
                   class="block w-full bg-transparent border-white rounded-full text-white border text-[16px] sm:text-[20px] px-4 py-2"
                   type="password" placeholder="Password">
            <x-error name="password"></x-error>

            <!-- Show Password -->
            <button type="button" id="ShowPassword"
                    class="w-full text-left text-[14px] sm:text-[16px] mt-[15px] text-white flex items-center gap-2">
                <span>Show Password</span>
                <i id="eye" class="fa fa-eye"></i>
            </button>

            <!-- Submit -->
            <input type="submit" value="Sign In"
                   class="bg-white text-[18px] sm:text-[20px] w-full rounded-full py-2 mt-[20px] cursor-pointer font-semibold">

            <!-- Forgot password -->
            <a href="#"
               class="text-right w-full text-white text-[14px] sm:text-[16px] hover:text-blue-700 mt-[20px]">
                Forgot Password?
            </a>

            <!-- Register -->
            <a href="{{route('register.page')}}"
               class="text-left w-full text-white text-[14px] sm:text-[16px] hover:text-blue-700 mt-[15px]">
                Don’t have an account? Register Now
            </a>
        </form>
    </section>
</main>
</body>
</html>
