<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();
        $categories = Category::all();
        $new_posts = Post::orderBy('id', 'desc')->limit(5)->get();

        return view('posts.index', [
                            'posts' => $posts,
                            'categories' => $categories,
                            'new_posts' => $new_posts
                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

        /**
     * Display posts by category the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function category($id){

        $categories = Category::all();
        $posts = Post::all()->where('category_id', $id);
        $new_posts = Post::orderBy('id', 'desc')->limit(5)->get();

        return view('posts.index', [
                    'posts' => $posts,
                    'categories' => $categories,
                    'new_posts' => $new_posts
                    ]);
    }

    /**
    * Display posts by user the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */


    public function user($id){

        $categories = Category::all();
        $posts = Post::all()->where('user_id', $id);
        $new_posts = Post::orderBy('id', 'desc')->limit(5)->get();

        return view('posts.index', ['posts' => $posts,
                            'categories' => $categories,
                            'new_posts' => $new_posts
                            ]);
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
        $categories = Category::all();
        $new_posts = Post::orderBy('id', 'desc')->limit(5)->get();

        return view('posts.show', [
                        'post' => $post,
                        'categories' => $categories,
                        'new_posts' => $new_posts
                        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
