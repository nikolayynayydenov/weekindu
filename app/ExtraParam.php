<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraParam extends Model
{
    protected $fillable = ['key'];
    protected $table = 'extras';
    
    public function values() 
    {
        return $this->hasMany('App\ExtraParamValue', 'extra_id');
    }
    
    public function event()
    {
        return $this->belongsTo('App\Event', 'event_id');
    }
}