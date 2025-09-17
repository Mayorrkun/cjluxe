<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen flex-col flex bg-gray-100 ">
<main>
  <x-navbar></x-navbar>
    {{$slot}}
</main>
<x-footer></x-footer>
</body>
</html>
