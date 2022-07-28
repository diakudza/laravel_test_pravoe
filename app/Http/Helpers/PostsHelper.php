<?php

namespace App\Http\Helpers;

use App\Models\Post;

class PostsHelper
{
    /**
     * @param Post $post
     * @param integer $id
     * @return mixed
     */
    public static function getPostById(Post $post)
    {
        return $post->where('id', $id)->first();
    }
}
