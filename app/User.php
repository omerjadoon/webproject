<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\{Business_detail};
use Auth;


class User extends Authenticatable implements MustVerifyEmail
{
 use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification()
    {

        $this->notify(new \App\Notifications\UserVerifyNotification(Auth::user()));  //pass the currently logged in user to the notification class
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new  \App\Notifications\PasswordReset($token));
    }
    public function businessdetail(){
        return $this->hasOne('App\Business_detail','user_id','id');
    }
    public function mediadetail(){
        return $this->hasOne('App\Media_detail','user_id','id');
    }
    public function paymentdetail(){
        return $this->hasOne('App\Payment_detail','user_id','id');
    }
    public function belongtocity(){
       return $this->belongsTo('App\City','city_id','id');
    }
    public function businesshasmanyads(){
        return $this->hasMany('App\Adsection','user_id','id');
    }
     public function businessadshasmanyleads()
    {
        return $this->hasMany('App\Lead_genrate','business_user_id','id');
    }
    public function particpatedincampaigncountmedia(){
        return $this->hasMany('App\Particapte_campaign','user_id','id')->where('user_id',Auth::user()->id)->count();
    }
    public function participationhasmanyleadscountmedia()
    {
        return $this->hasMany('App\Lead_genrate','media_user_id','id')->where('media_user_id',Auth::user()->id)->count();
    }
    public function commisionowedbymedia(){
        return $this->hasMany('App\Lead_genrate','media_user_id','id')->where('media_user_id',Auth::user()->id)->sum('media_commission_owned');
    }
     public function commisionrecbymedia(){
        return $this->hasMany('App\Lead_genrate','media_user_id','id')->where('media_user_id',Auth::user()->id)->where('media_comm_status',4)->sum('media_commission_owned');
    }
    
}
