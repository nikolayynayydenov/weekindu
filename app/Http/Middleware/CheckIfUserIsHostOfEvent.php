<?php

namespace App\Http\Middleware;

use Closure;
use App\Event;

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
        $eventId = is_numeric($request->segments()[1]) ? intval($request->segments()[1]) : false;
        $currentLoggedUserId = $request->user()->id;
        
        if ($event = Event::find($eventId)) {
            $eventHostId = $event->host;
            if ($eventHostId == $currentLoggedUserId) {
                return $next($request);
            }
            
            /*
             * The user is unauthorized
             */
            abort(403);
        }
    }
}
