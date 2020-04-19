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
        $posts = Post::when($request->search, function($query) use($request) {
                        $search = $request->search;

                        return $query->where('title', 'like', "%$search%")
                            ->orWhere('body', 'like', "%$search%");
                    })->with('tags', 'category', 'user')
                    ->withCount('comments')
                    ->published()
                    ->simplePaginate(5);
        $engineClient = new EngineClient('http://localhost:8000');

        if (Auth::check())
        {
                    $recomendationPosts = $engineClient->sendQuery(array('user'=> Auth::id(), 'num'=> 3));
        } else {
            $currentUser = User::where('ipAddress', $request->getClientIp())->first();
            if ($currentUser) {

            } else {
                $user = new User();
                $user->ipAddress = $request->getClientIp();
                $user->save();
                $currentUser = $user;
            }
            print_r($currentUser);
            $recomendationPosts = $engineClient->sendQuery(array('user'=> $currentUser->id, 'num'=> 3));
        }
        return view('frontend.index', compact('posts'));
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
