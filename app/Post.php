<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
use Storage;
use Laravelista\Comments\Commentable;
use Overtrue\LaravelFollow\Traits\CanBeLiked;

class Post extends Model
{
    use CanBeLiked;

    protected $fillable = ['title', 'content', 'category_id', 'date', 'image'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    use Commentable;

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add ($fields)
    {
        // или можно написать $post = new self;
        $post = new static;
        $post->fill($fields);
        if(isset($fields['image_name'])){
            $post->image = $fields['image_name'];
        }else {
            $post->image = 'no_image.png';
        }
        $post->user_id = Auth::user()->id;
        $post->save();
        return $post;
    }

    public function edit($fields)
    {
        $image = ($this->image);
        $this->fill($fields);

        if(isset($fields['image_name'])){
            if($image != 'no_image.png'){
                Storage::delete('images/' . $image);
            }
            $this->image = $fields['image_name'];
        }

        $this->save();
    }

    public function remove()
    {
        if($this->image != null && $this->image != 'no_image.png'){
            Storage::delete('images/' . $this->image);
        }
        $this->delete();
    }

    public function postsTopLikes($posts){

        $postsTopLikes = collect();

        foreach ($posts as $post){
            $likeCount = $post->likers()->count();
            $postId = $post->id;
            $postTitle = $post->title;
            $postsTopLikes->push([
                'postId' => $postId,
                'postTitle' => $postTitle,
                'likeCount' => $likeCount
            ]);
        }

        $postsTopLikesSort = $postsTopLikes->sortByDesc('likeCount')->take(5);
        return $postsTopLikesSort;
    }

}
