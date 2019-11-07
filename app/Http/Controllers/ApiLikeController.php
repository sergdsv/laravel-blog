<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;

class ApiLikeController extends Controller
{

    public function getlike($user_id, $post_id){


        $post = Post::find($post_id);
        // dd($user_id);
        $userLike = false;
        if($user_id != "false"){
            $user = User::find($user_id);
            $userLike = $user->hasLiked($post);
        }

        $likeCount = 0;
        $likeCount  = $post->likers()->count();



        return ['likeCount' => $likeCount, 'userLike' => $userLike];

    }

    public function togglelike($user_id, $post_id){

        $post = Post::find($post_id);
        $user = User::find($user_id);
        $user->toggleLike($post);

    }

}
