<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead_genrate extends Model
{
    
    public function participation() {
        return $this->belongsTo('App\Particapte_campaign','participation_id','id');
    }
}
