<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all()->sortBy("price"); 
        return view('menu.indexmenu',['menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.createmenu');
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
            'price'=>['required', 'numeric'],
            'weight'=>['required', 'numeric'],
            'meat'=>['required', 'numeric', 'lt:weight'],
            'description'=>['required']

           
        ],
        [
            'title.required'=>'Patiekalo pavadinimas privalomas',
            
            'price.required'=>'Patiekalo kaina privaloma',
            'price.numeric'=>'Patiekalo kaina turi būti skaičius',

            'weight.required'=>'Patiekalo svoris privalomas',
            'weight.numeric'=>'Patiekalo svoris turi būti skaičius',

            'meat.required'=>'Patiekalo mėsos svoris privalomas',
            'meat.numeric'=>'Patiekalo mėsos svoris turi būti skaičius',
            'meat.lt'=>'Patiekalo mėsos svoris turi būti mažesnis už viso patiekalo svorį',

            'description.required'=>'Patiekalo apibūdinimas privalomas',

        ]);
            if($validator->fails()){
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $menu = new Menu();
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        $menu->meat = $request->meat;
        $menu->description = $request->description;
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.editmenu',["menu" =>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        $menu->meat = $request->meat;
        $menu->description = $request->description;
        $menu->update();
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
