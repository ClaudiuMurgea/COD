<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   
    public function index()
    {   
        $parents = Category::whereNull('category_id')->get();       
        
        return view('category.index')->with('parents', $parents);
    }

    public function create()
    {   
        $cats = Category::all();
        return view('category.create')->with('cats', $cats);
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'nume' => 'required',
            'parentid' => 'nullable|exists:categories,id'
        ]);
        
        $cats = Category::create([
            'categoryname' => $request->nume,
            'category_id' => $request->parentid
        ]);
        return redirect(route('category.index'));
    }


    public function show()
    {
        $cats = Category::all();
        $parents = Category::whereNull('category_id')->get();
        
        return view('category.list')->with(['cats' => $cats,'parents' => $parents]);
    }

    public function edit(Request $request, $id)
    {          
        $category = Category::find($id);
        $parents = Category::whereNull('category_id')->get();
        return view('category.edit')->with(['category' => $category,'parents' => $parents]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'nume' => 'required',
            'parentid' => 'nullable|exists:categories,id'
        ]);

        $category->categoryname = $request->nume;
        $category->category_id = $request->parentid ?? null;

        $category->update();
        
        return redirect(route('category.index'));
    }

    public function destroy($id)
    {
        $parent = Category::find($id);
        $parent->delete();
        return redirect('/category/list');
    }
}
