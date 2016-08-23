<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraParamValue extends Model
{
    protected $fillable = ['value'];
    protected $table = 'values';
    
    public function extraParam()
    {
        return $this->belongsTo('App\ExtraParam', 'extra_id');
    }
}
