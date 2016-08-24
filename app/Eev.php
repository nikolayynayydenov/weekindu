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

    public function extra()
    {
        return $this->belongsTo('App\ExtraParam', 'extra_id');
    }

    public function value()
    {
        return $this->belongsTo('App\ExtraParamValue', 'value_id');
    }
}
