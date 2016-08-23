<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = ['id', 'invitation_code', 'created_at', 'updated_at'];

    public function event()
    {
        return $this->belongsTo('App\Event', 'invitation_code');
    }
}
