<?php

use Illuminate\Database\Seeder;
use App\Event;

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
            $event = new Event();
            $event->title = 'Softuni Camp - '.$i;
            $event->date = date('d, F - Y');
            $event->description = 'An awesome camp for gurus'.$i;
            $event->is_public = rand(0, 1);
            $event->type = 'Camp';
            $event->dress_code = 'Casual';
            $event->music = '["Electronic","Rock \/ Metal","Pop-Folk"]';
            $event->food = '["Chicken","Fries","Rice","Potatoes","Salad"]';
            $event->drinks = '["Water","Milk","Beer","Juice","Cider","Other"]';
            $event->location_string = 'Hisarya';
            $event->location_coordinates = '(42.70073056317599, 23.289127349853516)';
            $event->extras = '"{\"When are you going to get up?\":[\"7:30\",\"8:00\",\"10:30\",\"11:30\",\"14:00\"],\"Do you have a car?\":[\"yes\",\"no\"],\"What make is your laptop?\":[\"Lenovo\",\"Acer\",\"Toshiba\"]}"';
            $event->host = 1;
            $event->invitation_code = str_random(16);
            $event->save();
        }
    }
}
