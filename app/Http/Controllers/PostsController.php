<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::all();
        return view('index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $cats = Category::all();
        $subs = Category::all();
        return view('create', compact('cats', 'subs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension(); 
        $request->image->move(public_path('images'), $newImageName);

        $statuses = ['inactive', 'active' ];
        
        if($statuses[0] == $request->input('status')) {
            $statuses = 'inactive';
        } else {
            $statuses = 'active';
        }

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'status' => $statuses
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('edit')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   
        $post = Post::find($id);
        //check if post
        if ($request->isMethod('post')) { 
            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();
        }
        return view('edit')->with('post', $post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $post = Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $newImageName
        ]);
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
