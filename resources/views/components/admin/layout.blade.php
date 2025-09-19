<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin|CjLuxury</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-200 w-full h-[100vh]">
<x-admin.navbar> </x-admin.navbar>
<x-admin.sidenav> </x-admin.sidenav>
<main class="md:ml-[252px] md:pt-[50px] bg-white md:h-full px-[50px]">
    {{$slot}}
</main>

</body>
</html>
