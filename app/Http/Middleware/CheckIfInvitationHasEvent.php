<?php

namespace App\Http\Middleware;

use Closure;
use App\Event;

class CheckIfInvitationHasEvent
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
        /*
         * TODO: decode the id of the event
         */

        $eventId = is_numeric($request->segments()[1]) ? intval($request->segments()[1]) : false;
        if($event = Event::find($eventId)) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
