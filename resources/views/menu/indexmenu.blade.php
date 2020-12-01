
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
            @if(session()->has('info_message'))
                <div class="alert aler-info">
                {{session()->get('info_message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="grid grid-cols-12 gap-4 mt-10">
        <div class="col-start-5 col-span-2">
            <a href="{{ route('menu.create') }}">Sukurti naują patiekalą</a>
        </div>
        <div class="col-start-7 col-span-2">
            <a href="{{ route('restaurant.index') }}">Visi restoranai</a>
        </div>
        <div class="col-start-9 col-span-2">
            <a href="{{ route('menu.print') }}">Spauzdinti patiekalus</a>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-4 mt-10">
        <div class="col-start-5 col-span-5">
            <table class="table-auto bg-yellow-200 rounded-md">
                <thead>
                
                    <tr>
                    <th class="px-2 py-2">Pavadinimas</th>
                    <th class="px-2 py-2">Kaina</th>
                    <th class="px-2 py-2">Svoris, g.</th>
                    <th class="px-2 py-2">Patiekale esančios mėsos svoris, g.</th>
                    <th class="px-2 py-2">Apibūdinimas</th>
                    <th class="px-2 py-2">Taisyti</th>
                    <th class="px-2 py-2">Trinti</th>
                </thead>
                
                @foreach ($menus as $menu)
                
                <tbody>
                    <tr>
                    <td class="border px-2 py-1">{{$menu->title}}</td>
                    <td class="border px-2 py-1">{{$menu->price}}</td>
                    <td class="border px-2 py-1">{{$menu->weight}}</td>
                    <td class="border px-2 py-1">{{$menu->meat}}</td>
                    <td class="border px-2 py-1">{{$menu->description}}</td>
                    <td class="border px-2 py-1"></form><form action="{{route('menu.edit',$menu)}}" method="get">
                            <button type="submit">Taisyti</button>
                    <td class="border px-2 py-1"></form><form action="{{route('menu.destroy',$menu->id)}}" method="post">
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