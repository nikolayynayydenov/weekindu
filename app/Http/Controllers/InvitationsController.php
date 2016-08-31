<?php

namespace App\Http\Controllers;

use App\Eev;
use App\Event;
use App\ExtraParam;
use App\ExtraParamValue;
use App\Invitation;
use App\Http\Requests\StoreInvitationRequest;
use Crypt;
use Illuminate\Http\Request;

class InvitationsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['getGuestDetails', 'destroy']]);
        //$this->middleware('user_is_host_of_event', ['only' => ['destroy']]);
        $this->middleware('invitation_has_event', ['only' => ['show']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvitationRequest $request)
    {
        /*
         * Normalization:
         */

        $data = $request->except('_token');

        $trimData = function ($item) {
            if (is_array($item)) {
                $item = array_map('trim', $item);
                return $item;
            }
            return trim($item);
        };

        /*
         * Trim everything in the $data array.
         * Using custom trimming function because
         * some elements from $data are arrays
         */
        $data = array_map($trimData, $data);

        $invitationCode = Crypt::decrypt($data['invitation_code']);
        $event = Event::where('invitation_code', $invitationCode)->first();

        /*
         * Determine if the guest is coming:
         */

        $accepted = isset($data['accepted']);

        if ($event != null) {
            $invitation = new Invitation();
            $invitation->invitation_code = $invitationCode;
            $invitation->guest_name = $data['guest_name'];
            $invitation->accepted = $accepted;
            $invitation->save();

            $extras = json_decode(empty($data['extras']) ? '' : $data['extras']);

            if (!empty((array)$extras)) {
                foreach ($extras as $key => $values) {
                    /*
                     * Getting the extra id:
                     */

                    $extraId = ExtraParam::where('event_id', $event->id)
                        ->where('key', $key)
                        ->first(['id'])
                        ->id;

                    foreach ($values as $value) {
                        /*
                         * Getting the value id:
                         */

                        $valueId = ExtraParamValue::where('extra_id', $extraId)
                            ->where('value', $value)
                            ->first(['id'])
                            ->id;

                        /*
                         * Store in events_extras_values table"
                         */

                        $eev = new Eev();
                        $eev->event_id = $event->id;
                        $eev->extra_id = $extraId;
                        $eev->value_id = $valueId;
                        $eev->guest_id = $invitation->id;
                        $eev->save();
                    }
                }
            }

            return redirect('/event/'.$event->id)
                ->with('message', 'Your information has been sent.Thank you!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invitationCode)
    {
        $event = Event::where('invitation_code', $invitationCode)
            ->first();

        $event->invitation_code = Crypt::encrypt($event->invitation_code);

        return view('invitations.show')
            ->with('event', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guest = Invitation::find($id);
        $guest->delete();

        return back();
    }

    public function getGuestDetails()
    {
        if(request()->ajax()) {
            $guestId = intval(request()->get('guestId'));
            $eventInvitationCode = request()->get('eventInvitationCode');
            $guest = Invitation::find($guestId);
            $guestName = $guest->guest_name;
            $event = Event::where('invitation_code', $eventInvitationCode)->first();

            if($guest && $event) {
                // a guest with this id and event with this inv code exist:
                if($guest->invitation_code == $event->invitation_code) {
                    $guestEevs = $guest->eevs;
                    $data = [];
                    foreach ($guestEevs as $eev) {
                        $data['choices'][$eev->extra->key][] = $eev->value->value;
                    }

                    $data['_guestId_'] = $guestId;
                    $data['_guestName_'] = $guestName;
                    return response()->json($data);
                }
            }
        }
    }
}
