<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function index()
    {         
        return view('type.index');
    }
    
    public function create()
    {
        $types = Type::all();
        return view('type.index')->with('types', $type);
    }

    public function store(Request $request) 
    {   
        $type = Type::create([
            'typename' => $request->input('name')
        ]);
        return redirect('');
    }

    public function show()
    {   
        $types = Type::all();

        return view('type.list')->with('types', $types);
    }

    public function edit($id)
    {
        $type = Type::find($id);

        return view('type.edit')->with('type', $type);
    }
    
    public function update(Request $request, $id)
    {
        $type = new Type;
        $type = Type::find($id);
        $type->typename = $request->name;
        $type->update();

        return redirect(route('type.index'));
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();

        return redirect(route('type.index'));
    }
}
