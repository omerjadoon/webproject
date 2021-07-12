<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particapte_campaign extends Model
{
    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function ads() {
        return $this->belongsTo('App\Adsection','ad_id','id');
    }
     public function participationhasmanyleads()
    {
        return $this->hasMany('App\Lead_genrate','participation_id','id');
    }
     
}
