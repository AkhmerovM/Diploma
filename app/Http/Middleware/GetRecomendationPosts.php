<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use predictionio\EngineClient;

class GetRecomendationPosts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $engineClient = new EngineClient('http://localhost:8000');

        if (Auth::check())
        {
            //        $response = $engineClient->sendQuery(array('user'=> Auth::id(), 'num'=> 3));
        }
//        var_dump('net');die();
//        $response = $engineClient->sendQuery(array('user'=> 1, 'num'=> 4));
        return $next($request);
    }
}
