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
        $invitationCode = $request->segments()[1];

        if($event = Event::where('invitation_code', $invitationCode)->first()) {
            //dd($event->title);
            return $next($request);
        } else {
            abort(404);
        }
    }
}
