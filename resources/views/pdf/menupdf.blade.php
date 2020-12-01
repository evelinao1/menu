
<?php
use App\Models\Menu;

$menus = Menu::all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
    <style>
    body{
            margin: 0;
            padding: 0;
            vertical-align: top;
            box-sizing: border-box;
            font-family: "Times New Roman";
            width: 700px;
            margin-left:  calc(50% - 350px);
            border: solid;
            border-color: #FACA15;
            
        }
           
        }
        #header{
            height:240px;
            text-align: center;
        }
    
            
        table {
            font-family: "Times New Roman";
            border-collapse: collapse;
            width: 100%;
            margin-left: 4%;
                
            }
            td, th {
            border: 1px solid #FCE96A;
            text-align: left;
            padding: 8px;
            }
            tr:nth-child(even) {
            background-color: #FCE96A;
            }
    </style>
</head>
<body>
    <div>
      <div id="header">
        <h1>Restoranų patiekalų sąrašas</h1>
        
    </div>
    <table>
  
        <tr>
        <th>Pavadinimas</th>
        <th>Kaina</th>
        <th>Svoris, g.</th>
        <th>Patiekale esančios mėsos svoris, g.</th>
        <th>Apibūdinimas</th>
        
    
    
    @foreach ($menus as $menu)
    
    
        <tr>
        <td>{{$menu->title}}</td>
        <td>{{$menu->price}}</td>
        <td>{{$menu->weight}}</td>
        <td>{{$menu->meat}}</td>
        <td>{{$menu->description}}</td>
        </tr>
    
    
    @endforeach
    </table>
</body>
</html>