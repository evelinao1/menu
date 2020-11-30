<?php
use App\Models\Menu;
$menus = Menu::all();
$id = Menu::where('restaurant_id', '=', $restaurant->id)->value('id');
print_r($id);
?>
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
        <p class="text-2xl">{{$restaurant->title}} pakeisti patiekala</p>
        <form action="{{route('restaurant.updatemenu', $id)}}" method="post">
        
        <label for="title">Patiekalai:</label><br>
            <select id="menu_id" name="title">
                <?php 
                
                foreach ($menus as $menu){ 
                    // print_r($restaurant);
                 ?>
                
                <option value="<?=$menu?>"><?php echo $menu->title?></option>
            <?php }?>
            </select>
        
        <x-jet-button class="ml-4">
                        {{ __('Pakeisti') }}
                    </x-jet-button>
            @csrf
        </form>
    </div>
</div>

</body>
</html>