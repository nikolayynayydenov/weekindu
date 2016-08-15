<?php

namespace App\Http\Middleware;

use Closure;
use App\Event;

class CheckIfEventIsPublic
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
        $event = Event::find($eventId); // we are sure the event exists bacause of the CheckIfEventExists middleware

        /*
         * If a user is logged, take their id, otherwise assign false:
         */

        $loggedUserId = $request->user() ? $request->user()->id : false;

        if ($event->is_public || $event->host === $loggedUserId) {
            /*
             * Show event only if the current logged user owns it or if it's public
             */
            return $next($request);
        } else {
            abort(401);
        }
    }
}
