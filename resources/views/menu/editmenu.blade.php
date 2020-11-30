<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-yellow-300">
<div class="grid grid-cols-12 gap-4 mt-5">
    <div class="col-start-5 col-span-5">
        <p class="text-2xl">Sukurti naują patiekalą</p>
        <form action="{{route('menu.update', $menu)}}" method="post">
        <label for="title">Pavadinimas:</label><br>
        <input class="bg-yellow-200 rounded-md" type="title" id="title" name="title" value="{{$menu->title}}"><br><br>
        <label for="price">Kaina:</label><br>
        <input class="bg-yellow-200 rounded-md" type="price" id="price" name="price" value="{{$menu->price}}"><br><br>
        <label for="weight">Svoris:</label><br>
        <input class="bg-yellow-200 rounded-md" type="weight" id="weight" name="weight" value="{{$menu->weight}}"><br><br>
        <label for="meat">Patiekale esančios mėsos svoris:</label><br>
        <input class="bg-yellow-200 rounded-md" type="meat" id="meat" name="meat" value="{{$menu->meat}}"><br><br>
        <label for="description">Apibūdinimas:</label><br>
        <textarea class="bg-yellow-200 rounded-md" rows="4" cols="50" name="description">{{$menu->description}}</textarea>
        
        
        <x-jet-button class="ml-4">
                        {{ __('Pakeisti') }}
                    </x-jet-button>
            @csrf
        </form>
    </div>
</div>

</body>
</html>