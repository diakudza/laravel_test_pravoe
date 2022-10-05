<?php

namespace App\Http\Helpers;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class SortPostsHelper
{
    /**
     * @param Post $post
     * @param integer $id
     * @return mixed
     */
    public static function sort(Post $post, $category, $date, $searchword): LengthAwarePaginator
    {
        $posts = $post
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category);
            })
            ->when($date, function ($query, $date) {
                $query->whereDate('created_at', '=', $date);
            })
            ->when($searchword, function ($query, $searchword) {
                $query->where('title', 'LIKE', '%'.$searchword.'%');
            })
            ->paginate(20)
            ->withQueryString();

        return $posts;
    }
}
