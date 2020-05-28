<?php

namespace App\Http\Middleware;
use App\User;
use Illuminate\Support\Facades\Auth;
use predictionio\EventClient;

use Closure;

class SetShownPost
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
        $client = new EventClient('lMIAHhBrJBBL7owDaivnBTlJcVUGGWVmH7-e0ZVXlttMZWy0lLE7mpblqn1LcW-l', 'http://0.0.0.0:7070/');
        if (Auth::check()) {
            $id       = Auth::id();
            $url      = $request->url();
            $urlItems = array_reverse(explode('/', $url));
            $postId   = null;
            // просмотр статьи
            if ($urlItems[1] === 'posts') {
                $postId = $urlItems[0];
                $value = 4;
                // прочтение статьи
                if ($request->method() === 'POST') {
                    $value = 6;
                }
            }
            // комментарий к статье
            if ($urlItems[0] === 'comment') {
                $postId = $urlItems[1];
                $value = 8;
            }
            if ($id && $postId) {
                $response = $client->createEvent([
                    'event'            => 'rate',
                    'entityType'       => 'user',
                    'entityId'         => $id,
                    'targetEntityType' => 'item',
                    'targetEntityId'   => $postId,
                    'properties'       => ['rating' => $value]
                ]);
            }
        }
        return $next($request);
    }
}
