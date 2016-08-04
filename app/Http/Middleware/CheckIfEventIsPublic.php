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
        $event = Event::find($eventId);
        if ($event->is_public || $event->host === $request->user()->id) {
            /*
             * Show event only if the current logged user owns it or if it's public
             */
            return $next($request);
        } else {
            abort(401);
        }
    }
}
