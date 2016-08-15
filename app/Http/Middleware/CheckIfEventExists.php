<?php

namespace App\Http\Middleware;

use Closure;
use App\Event;

class CheckIfEventExists
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
        try {
            $eventId = is_numeric($request->segments()[1]) ? intval($request->segments()[1]) : false;
            $event = Event::findOrFail($eventId);
            return $next($request);
        } catch (ModelNotFoundException $mnfe) {
            abort(404);
        }
    }
}
