<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eev extends Model
{
    protected $table = 'events_extras_values';
    protected $fillable = [];

    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}
