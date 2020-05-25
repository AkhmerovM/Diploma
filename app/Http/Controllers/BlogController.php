<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use predictionio\EngineClient;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $recomendationPosts = [];

        $posts = Post::when($request->search, function($query) use($request) {
                        $search = $request->search;

                        return $query->where('title', 'like', "%$search%")
                            ->orWhere('body', 'like', "%$search%");
                    })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(5);
        $engineClient = new EngineClient('http://localhost:8000');
        $recomendation = $engineClient->sendQuery(array('user'=> Auth::id(), 'num'=> 3));
        if (Auth::check())
        {
            $recomendationPosts = [];
            foreach ($recomendation['itemScores'] as $item) {
                $post = Post::all()->where('id', $item['item'])->first();
                if ($item['item'] && $post) {
                    array_push($recomendationPosts, $post);
                }
            }
        } else {
            $handle = fopen("sample_movielens_data.txt.save", "r");
            $data = [];
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    // process the line read.
                    $raw = explode("::", $line);
                    $postId = $raw[1];
                    if (!isset($data[$postId])) {
                        $data[$postId] = 1;
                    } else {
                        $data[$postId] = $data[$postId] + 1;
                    }
                }
                fclose($handle);
            } else {
                // error opening the file.
            }
            if (count($data)) {
                asort($data);
                $result = array_slice($data, -3, 3, true);
                foreach ($result as $key => $value) {
                    $post = Post::all()->where('id', $key)->first();
                    if ($post) {
                        array_push($recomendationPosts, $post);
                    }
                }
            }
        }
        return view('frontend.index', ['posts' => $posts, 'recomendationPosts' => $recomendationPosts]);
    }
    public function sendShownPost() {
        return null;
    }
    public function post(Post $post)
    {
        $post = $post->load(['comments.user', 'tags', 'user', 'category']);

        return view('frontend.post', compact('post'));
    }

    public function comment(Request $request, Post $post)
    {
        $this->validate($request, ['body' => 'required']);

        $post->comments()->create([
            'body' => $request->body
        ]);
        flash()->overlay('Comment successfully created');

        return redirect("/posts/{$post->id}");
    }
}
