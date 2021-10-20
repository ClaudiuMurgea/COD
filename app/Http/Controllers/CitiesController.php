<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    public function index() 
    {
        $cities = City::all();

        return view('city.index')->with('cities', $cities);
    }

    public function create() 
    {
        $cities = City::all();

        return view('city.index')->with('cities', $cities);
    }
    
    public function store(Request $request) 
    {
        $city = City::create([
            'cityname' => $request->input('name')
        ]);

        return redirect(route('city.index'));
    }

    public function show() 
    {
        $cities = City::all();

        return view('city.list')->with('cities', $cities);
    }
    
    public function edit($id) 
    {

        $city = City::find($id);

        return view('city.edit')->with('city', $city);
    
    }

    public function update(Request $request, $id)
    {   
        $city = new City;
        $city = City::find($id);
        $city->cityname = $request->name;
        $city->update();
        
        return redirect(route('city.index'));
    }
    
    public function destroy($id) 
    {
        $city = City::find($id);
        $city->delete();

        return redirect(route('city.index'));
    }
}
