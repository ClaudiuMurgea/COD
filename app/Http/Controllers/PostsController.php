<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\City;
use App\Models\Type;

class PostsController extends Controller
{
    public function index()
    {   
        $posts = Post::all();
        $cities = City::all();
        return view('post.index', compact('posts', 'cities'));
    }

    public function create()
    {  
        $parents = Category::whereNull('category_id')->get();
        $cities = City::all();
        $types = Type::all();
        return view('post.create', compact('parents', 'cities', 'types'));
    }

    public function store(Request $request)
    {
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension(); 
        $request->image->move(public_path('images'), $newImageName);

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'city_id' => $request->input('city_id'),
            'category_id' => $request->input('parent_category'),
            'subcategory_id' => $request->input('child_category'),
            'type_id' => $request->input('type_id'),
            'image_path' => $newImageName,
        ]);

        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('post', $post);
    }

    public function edit($id)
    {   
        $post = Post::find($id);
        $parents = Category::whereNull('category_id')->get();
        $children = Category::where('category_id',$post->category_id)->get();
        $cities = City::all();
        $types = Type::all();
         
        return view('post.edit', compact('post', 'parents', 'cities', 'types','children'));
    }

    public function update(Request $request, $id)
    {    
        $post = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;

        // $post->category_id = $request->input('category_id');
        // $post->city_id = $request->input('city_id');
        // $post->type_id = $request->input('type_id');       
        // $post->save();

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'type_id' => $request->type_id,
            'subcategory_id' => $request->child_id      
        ];

        $post->update($data);
             
        return redirect('/');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
    
    public function ajax($parentID){
        $parentCat = Category::find($parentID);

        if(!$parentCat){
            return response()->json([
                'errors'    => true,
                'message'   => 'This parent id is not correct! Please dont cheat'
            ]);
        }


        return response()->json([
            'errors'       => false,
            'message'       => $parentCat->Subcategory
        ]);
    }
}
