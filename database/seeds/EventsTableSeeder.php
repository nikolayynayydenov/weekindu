H<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $event = new App\Event();
            $event->title = 'Softuni Camp - '.$i;
            $event->date = date('d, F - Y');
            $event->description = 'An awesome camp for gurus'.$i;
            $event->is_public = rand(0, 1);
            $event->type = 'Camp';
            $event->dress_code = 'Casual';
            $event->location_string = 'Hisarya';
            $event->location_x = '42.70073056317599';
            $event->location_y = '23.289127349853516';
            $event->background_photo = 'default.png';
            $event->host = 1;
            $event->invitation_code = str_random(16);
            $event->save();

            // add some extras to this event:

            // NEW EXTRA: What make is your laptop?

            $extra = new App\ExtraParam();
            $extra->event_id = $event->id;
            $extra->key = 'What make is your laptop?';
            $extra->save();

            $value = new App\ExtraParamValue();
            $value->extra_id = $extra->id;
            $value->value = 'Lenovo';
            $value->save();

            $value = new App\ExtraParamValue();
            $value->extra_id = $extra->id;
            $value->value = 'Acer';
            $value->save();

            $value = new App\ExtraParamValue();
            $value->extra_id = $extra->id;
            $value->value = 'Toshiba';
            $value->save();

            // NEW EXTRA: What music instrument do you play?

            $extra = new App\ExtraParam();
            $extra->event_id = $event->id;
            $extra->key = 'What music instrument do you play?';
            $extra->save();

            $value = new App\ExtraParamValue();
            $value->extra_id = $extra->id;
            $value->value = 'Guitar';
            $value->save();

            $value = new App\ExtraParamValue();
            $value->extra_id = $extra->id;
            $value->value = 'Piano';
            $value->save();

            $value = new App\ExtraParamValue();
            $value->extra_id = $extra->id;
            $value->value = 'Drums';
            $value->save();
        }
    }
}
