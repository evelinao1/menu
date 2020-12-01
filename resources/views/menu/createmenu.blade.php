<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-yellow-300">
    <div class="grid grid-cols-12 gap-4 mt-10">
        <div class="col-start-5 col-span-5">
            @if ($errors->any())
                <div class="alert">
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            @if(session()->has('success_message'))
                <div class="alert alert-success">
                    {{session()->get('success_message')}}
                </div>
            @endif
            
            @if(session()->has('info_message'))
                <div class="alert alert-info">
                    {{session()->get('info_message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-12 gap-4 mt-5">
        <div class="col-start-5 col-span-5">
            <p class="text-2xl">Sukurti naują patiekalą</p>
            <form action="{{route('menu.store')}}" method="post">
            <label for="title">Pavadinimas:</label><br>
            <input class="bg-yellow-200 rounded-md" type="title" id="title" name="title" value="{{old('title')}}"><br><br>
            <label for="price">Kaina:</label><br>
            <input class="bg-yellow-200 rounded-md" type="price" id="price" name="price" value=""><br><br>
            <label for="weight">Svoris:</label><br>
            <input class="bg-yellow-200 rounded-md" type="weight" id="weight" name="weight" value=""><br><br>
            <label for="meat">Patiekale esančios mėsos svoris:</label><br>
            <input class="bg-yellow-200 rounded-md" type="meat" id="meat" name="meat" value=""><br><br>
            <label for="description">Apibūdinimas:</label><br>
            <textarea class="bg-yellow-200 rounded-md" rows="4" cols="50" name="description">
        Apibūdinimas...</textarea>
            
            <x-jet-button class="ml-4">
                            {{ __('Sukurti') }}
                        </x-jet-button>
                @csrf
            </form>
        </div>
</div>

</body>
</html>