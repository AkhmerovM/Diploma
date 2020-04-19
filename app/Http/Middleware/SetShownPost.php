<?php

namespace App\Http\Middleware;
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
        $client = new EventClient('b_FqHcqdizerPne6qDgqRQB-9GVnJ1pcP-8ejsNoQ5P4mdqq26S63SVD0JbLeIC-', 'http://0.0.0.0:7070/');
//        var_dump($request->getClientIp());die();
//        print_r($request->getUser());
//        $response = $client->createEvent(array(
//        'event' => 'rate',
//        'entityType' => 'user',
//        'entityId' => 11,
//        'targetEntityType' => 'item',
//        'targetEntityId' => 52,
//        'properties' => array('rating'=> 4)
//));

//        print_r($response);die();
        return $next($request);
    }
}
