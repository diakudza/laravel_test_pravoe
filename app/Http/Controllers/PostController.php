<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PostsHelper;
use App\Http\Requests\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Post $post, Category $category, Request $request)
    {
        if ($request->input('searchQuery')) {
            $query = $request->input('searchQuery');
            $posts = $post->where('title', 'like', $query . "%")->paginate(3);
        } elseif ($request->input('sortByCategory')) {
            $query = $request->input('sortByCategory');
            $selectedCategory = $query;
            $posts = $post->where('category_id', $query)->paginate(15);
        } elseif ($request->input('sortByDate')) {
            $query = $request->input('sortByDate');
            $selectedDate = $query;
            $posts = DB::table('posts')->select('*')
                ->where(DB::raw('CAST(created_at AS CHAR)'), 'like', "%$query%")
                ->paginate(15);
        } else {
            $posts = Post::orderBy('created_at', 'DESC')->paginate(15);
        }

        return Inertia::render('Public/Posts', [
            'posts' => $posts,
            'categories' => $category->all(),
            'date' => Post::select('created_at')->distinct()->get(),
            'title' => 'Страница новостей',
            'selected' => $selectedCategory ?? 0,
            'selectedDate' => $selectedDate ?? 0,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Public/PostAdd', [
            'title' => 'Страница создания новости',
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, PostStoreRequest $request)
    {
        $post->fill($request->validated());
        $post->save();
        return redirect()->to(route('Post.index'))->with('success',  "Пост добавлен!");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $article
     * @return \Inertia\Response
     */
    public function show(Request $request, Post $post, $id)
    {
        return Inertia::render('Public/Post', [
            'post' => $post->where('id', $id)->with(['comments', 'author', 'comments.user'])->first(),
            'title' => 'Страница новости'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $article)
    {
        //
    }
}
