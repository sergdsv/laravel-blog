<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        
        return view('admin.blog.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        return view('admin.blog.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([

            'title' => 'required|min:2|max:100',
            'content' => 'required',
            'category_id' => 'required'
        ], [

            'title.required' => 'Заполните поле',
            'title.min' => 'Имя должно содержать не менее 2 символов.',
            'title.max' => 'Имя не должно превышать 50 символов.',
            'content.required' => 'Заполните поле',
            'category_id.required' => 'Заполните поле',

        ]);
        

        if ($request-> hasFile ('image')) {
            $imageName = time().'.'.request()->image->extension();
            request()->image->move(public_path('images'), $imageName);
            $request['image_name'] = $imageName;
         } 
        
        $post = Post::add($request->all());

        return back()->with('success', 'Запись успешно создана.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin.blog.posts.edit', ['post' => $post, 'categories' => $categories]);
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
        request()->validate([

            'title' => 'required|min:2|max:100',
            'content' => 'required'
        ], [

            'title.required' => 'Заполните поле',
            'title.min' => 'Имя должно содержать не менее 2 символов.',
            'title.max' => 'Имя не должно превышать 50 символов.',
            'content.required' => 'Заполните поле',

        ]);
        

        if ($request-> hasFile ('image')) {
            $imageName = time().'.'.request()->image->extension();
            request()->image->move(public_path('images'), $imageName);
            $request['image_name'] = $imageName;            
         } 
        $post = Post::find($id);
        $post->edit($request->all());
        return back()->with('success', 'Запись успешно отредактирована.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->remove();
        return back()->with('success', 'Запись успешно удалена.');
    }
}
