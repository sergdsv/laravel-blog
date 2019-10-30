<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    protected $fillable = ['title'];

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

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
        $post->save();
    }

    public function remove()
    {
        $this->delete();
    }


}
