<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Adsection extends Model
{
    protected $table='adsections';
    public function belongtomedia(){
       return $this->belongsTo('App\Media_type','media_id','id');
    }
    public function belongtouser(){
       return $this->belongsTo('App\User','user_id','id');
    }
     public function ad_participation () {
       return $this->hasOne('App\Particapte_campaign', 'ad_id', 'id')->where('user_id',Auth ::user()->id)->exists();
    }
    public function adhasmnayparticpnt()
    {
        return $this->hasMany('App\Particapte_campaign', 'ad_id', 'id');
    }
}
