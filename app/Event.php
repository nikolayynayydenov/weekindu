<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['host', 'created_at', 'updated_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'host');
    }

    public function extras ()
    {
        return $this->hasMany('App\ExtraParam', 'event_id');
    }
}
