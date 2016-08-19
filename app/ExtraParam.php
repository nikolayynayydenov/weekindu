<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraParam extends Model
{
    protected $fillable = ['key'];
    protected $table = 'extra_params';
    
    public function values() 
    {
        return $this->hasMany('App\ExtraParamsValues', 'extra_params_id');
    }
    
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}