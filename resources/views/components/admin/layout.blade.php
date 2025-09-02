<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin|CjLuxury</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<x-admin.navbar> </x-admin.navbar>
<x-admin.sidenav> </x-admin.sidenav>
<main class="content">
    {{$slot}}
</main>

</body>
</html>
