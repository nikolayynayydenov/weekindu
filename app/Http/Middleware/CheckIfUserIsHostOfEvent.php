<?php

namespace App\Http\Middleware;

use Closure;



class CheckIfUserIsHostOfEvent
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
        $eventId = intval($request->segments()[1]);
        $currentLoggedUserId = $request->user()->id;
        
        if ($event = \App\Event::find($eventId)) {
            $eventHostId = $event->host;
            if ($eventHostId === $currentLoggedUserId) {
                return $next($request);
            }
            
            /*
             * The user is unauthorized
             */
            abort(401);
        } else {
            /*
             * An event with this id can't be found
             */
            abort(404);
        }
    }
}
