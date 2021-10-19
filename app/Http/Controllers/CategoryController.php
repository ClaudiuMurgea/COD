<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $parents = Category::whereNull('category_id')->get();       
        
        return view('category.index')->with('parents', $parents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cats = Category::all();
        return view('category.create')->with('cats', $cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cats = Category::all();
        $parents = Category::whereNull('category_id')->get();
        
        return view('category.list')->with(['cats' => $cats,'parents' => $parents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {          
        $category = Category::find($id);
        $parents = Category::whereNull('category_id')->get();
        return view('category.edit')->with(['category' => $category,'parents' => $parents]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Category::find($id);
        $parent->delete();
        return redirect('/category/list');
    }
}
