<?php
use App\Models\Menu;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-yellow-300">
    <div class="grid grid-cols-12 gap-4 mt-20">
        <div class="col-start-10 col-span-1">
            <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 mt-10">
        <div class="col-start-5 col-span-3">
            <a href="{{ route('restaurant.create') }}">Sukurti naują restoraną</a>
        </div>
        <div class="col-start-8 col-span-2">
            <a href="{{ route('menu.index') }}">Rodyti menu</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-4 mt-10">
        <div class="col-start-5 col-span-7">
            <form action="{{route('restaurant.sort')}}" method="post">
                <label id="pusher" for="cars">Rodyti restoranus, kuriose yra patiekalas:</label>
                <select name="menu_id" id="menu_id" class="bg-yellow-200 rounded-md">
                    @foreach ($menus as $menu)
                    <option  value="{{$menu->id}}">{{$menu->title}}</option>
                    @endforeach
                </select>
                <x-jet-button class="ml-4">
                                    {{ __('Pasirinkti') }}
                                </x-jet-button>
                @csrf
            </form> 
        </div>
    </div>
    <div class="grid grid-cols-12 gap-4 mt-10">
        <div class="col-start-5 col-span-5">
            <table class="table-auto bg-yellow-200 rounded-md">
                <thead>
                
                    <tr>
                    <th class="px-2 py-2">Pavadinimas</th>
                    <th class="px-2 py-2">Darbuotojų skaičius</th>
                    <th class="px-2 py-2">Maksimalus klientų skaičius</th>
                    <th class="px-2 py-2">Patiekalas</th>
                    <th class="px-2 py-2">Daryt pakeitimus</th>
                    <th class="px-2 py-2">Trinti</th>
                </thead>
                
                @foreach ($restaurants as $restaurant)
                
                <tbody>
                    <tr>
                    <td class="border px-2 py-1">{{$restaurant->title}}</td>
                    <td class="border px-2 py-1">{{$restaurant->staff}}</td>
                    <td class="border px-2 py-1">{{$restaurant->customers}}</td>
                    <td class="border px-2 py-1">{!!Menu::where('id', '=', $restaurant->menu_id)->value('title')!!}</td>
                    <td class="border px-2 py-1"></form><form action="{{route('restaurant.edit',$restaurant)}}" method="get">
                            <button type="submit">Keisti</button>
                    <td class="border px-2 py-1"></form><form action="{{route('restaurant.destroy',$restaurant->id)}}" method="post">
                            <button type="submit">Trinti</button>
                            @csrf
                            </form></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>