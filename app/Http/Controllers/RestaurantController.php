<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all()->sortBy("title");
        $menus = Menu::all()->sortBy("title");
        return view('restaurants.index',['restaurants'=>$restaurants, 'menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all()->sortBy("title");
        return view('restaurants.create',['menus'=>$menus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'title'=>['required'],
            'staff'=>['required', 'numeric'],
            'customers'=>['required', 'numeric'],
            
           
        ],
        [
            'title.required'=>'Restorano pavadinimas privalomas',
            
            'staff.required'=>'Restorano darbuotojų skaičius privaloma',
            'staff.numeric'=>'Restorano darbuotojų skaičius turi būti skaičius',

            'customers.required'=>'Restorano galimų aptarnauti klientų skaičius privalomas',
            'customers.numeric'=>'Restorano galimų aptarnauti klientų skaičius turi būti skaičius',



        ]);
            if($validator->fails()){
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        $restaurant = new Restaurant();
        $restaurant->title = $request->title;
        $restaurant->staff = $request->staff;
        $restaurant->customers = $request->customers;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all()->sortBy("title");
        return view('restaurants.edit',["restaurant" =>$restaurant, 'menus'=>$menus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->title;
        $restaurant->staff = $request->staff;
        $restaurant->customers = $request->customers;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->update();
        return redirect()->route('restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index');
    }

    public function sort(Request $request)
    {
        $id = $request->menu_id;
        $sortrestaurants = Restaurant::where('menu_id', '=', $id)-> get();

        
        return view ('restaurants.sorted',['sortrestaurants' => $sortrestaurants]);
    }
}
