<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</div>
</div>
<div class="grid grid-cols-12 gap-4 mt-5">
    <div class="col-start-5 col-span-5">
        <p class="text-2xl">Sukurti naują restoraną</p>
        <form action="{{route('restaurant.store')}}" method="post">
        <label for="title">Pavadinimas:</label><br>
        <input class="bg-yellow-200 rounded-md" type="title" id="title" name="title" value=""><br><br>
        <label for="staff">Darbuotojai:</label><br>
        <input class="bg-yellow-200 rounded-md" type="staff" id="staff" name="staff" value=""><br><br>
        <label for="customers">Klientai:</label><br>
        <input class="bg-yellow-200 rounded-md" type="customers" id="customers" name="customers" value=""><br><br>
        <label for="menu_id">Menu:</label><br>
            <select id="menu_id" name="menu_id">
                <?php foreach ($menus as $menu){ 
                    // print_r($menu);
                 ?>
                
                <option value="<?=$menu->id?>"><?php echo $menu->title?></option>
            <?php }?>
            </select>
        
        <x-jet-button class="ml-4">
                        {{ __('Sukurti') }}
                    </x-jet-button>
            @csrf
        </form>
    </div>
</div>

</body>
</html>