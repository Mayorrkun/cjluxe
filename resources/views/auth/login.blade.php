<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | CjLuxury</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="flex bg-[#000] py-[5px]">
    <a href="{{route('home')}}" class=" md:ml-auto md:mr-[100px] mx-auto  items-center flex gap-[10px]">
        <img src="{{url('images/logo/logo-white.png')}}" alt="" class="h-[25px]">
        <h3 class="fa w-auto text-white">CJLUXURY</h3>
    </a>
</nav>
<main class="flex w-full">
    <section class="md:w-1/2 ml-auto bg-black h-screen bg-opacity-95 py-[100px] justify-center flex">
        <form action="" class="">
            <h1 class="text-white text-[26px] font-[400]">Sign In</h1>
        </form>
    </section>
</main>

</body>
</html>
