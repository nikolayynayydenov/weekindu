<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['host'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'host');
    }
}
