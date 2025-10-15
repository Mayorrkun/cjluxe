<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CjLuxury | Luxury clothing brand and store</title>
    <link rel="icon" href="{{url('images/logo/logo-white.png')}}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen flex-col flex bg-gray-50 ">
<main>
    <x-popup></x-popup>
  <x-navbar></x-navbar>
    {{$slot}}
</main>
<x-footer></x-footer>
</body>
</html>
