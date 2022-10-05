<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Faker\Factory;
use Inertia\Inertia;

class MainController extends Controller
{
    public function index(Post $post, Comment $comment)
    {
        $faker = Factory::create();
        if ($max = $post->max('id')) {
            $min = $post->min('id');
            $randPosts = $post->where('id', rand($min, $max))->first();
        } else {
            $randPosts = ['title' => $faker->realText('10'),
                'text' => $faker->realText('700'),
            ];
        }
        $lastComment = $comment->select('id', 'text', 'user_id')
            ->with('user')->orderByDesc('id')->limit('2')->get();
        return Inertia::render('Public/Main', [
            'title' => 'Home page',
            'lastComments'=> $lastComment,
            'randPost' => $randPosts,

        ]);
    }
}
