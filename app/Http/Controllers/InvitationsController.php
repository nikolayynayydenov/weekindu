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
        $this->middleware('invitation_has_event', ['only' => ['show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $invitationCode = Crypt::decrypt($request->get('invitation_code'));
        $event = Event::where('invitation_code', $invitationCode)->first();

        if ($event != null) {
            $invitation = new Invitation();
            $invitation->invitation_code = $invitationCode;
            $invitation->guest_name = $data['guest_name'];
            $invitation->guest_email = $data['guest_email'];
            $invitation->save();

            $extras = json_decode($data['extras']);

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
                        $eev->save();
                    }
                }
            }

            return redirect('/event/'.$event->id)
                ->with('message', 'Your feedback was sent. Thank you!');
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

        $event->music = json_decode($event->music);
        $event->food = json_decode($event->food);
        $event->drinks = json_decode($event->drinks);
        $event->invitation_code = Crypt::encrypt($event->invitation_code);

        return view('invitations.show')
            ->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
