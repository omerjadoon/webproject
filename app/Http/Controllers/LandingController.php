<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\{Country,State,City,Media_type,Business_detail,Contactus,Adsection,Particapte_campaign,Lead_genrate,User};
use Auth;

class LandingController extends Controller
{
    function generatePin() {
        // Generate set of alpha characters
        $alpha = array();
        for ($u = 65; $u <= 90; $u++) {
            // Uppercase Char
            array_push($alpha, chr($u));
        }
        // Get random alpha character
        $rand_alpha = '';
        for ($i = 0; $i < 2; $i++) {
            $rand_alpha .= $alpha[rand(0, count($alpha) - 1)];
        }
        $pin=$rand_alpha.'-'.str_replace('0','',date('yhmids'));
        return $pin;
    }
    public function index(){
        return view('welcome');
    }
    public function participation($userid,$adposteduserid,$ad,$participation_id){

        $participantid= \Crypt::decrypt($userid);
        $posted_user_id =\Crypt::decrypt($adposteduserid);
        $ad_id= \Crypt::decrypt($ad);
        $participation_id=\Crypt::decrypt($participation_id);
        $weblink=User::findOrFail($posted_user_id)->businessdetail->website_link;
        $data=new Lead_genrate();
        $data->lead_id=$this->generatePin();
        $data->participation_id=$participation_id;
        $data->ad_id=$ad_id;
        $data->business_user_id=$posted_user_id;
        $data->media_user_id=$participantid;
        $data->total_amount=50;
        $data->bfa_commission_owned=10;
        $data->media_commission_owned=40;
        $data->save();
        // $camp=Particapte_campaign::findOrFail($participation_id);
        // $camp->hit_count=$camp->hit_count+1;
        //  $camp->update();   
        return \Redirect::away('https://'.$weblink);
           

    }

    public function savecontact(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);
       $data=[
        
                 'name' => $request->name,
                 'email' => $request->email,
                 'subject' => $request->subject,
                 'phone_number' => $request->phone_number,
                 'message' => $request->message,
             
       ];
        try{
            Mail::send('emails.contact-us',['data' => $data], function($message) use ($data)
               {
                $message->from($data['email'], $data['name']);
                $message->to('hasham@mage-io.com')->subject('Contact Us Request');
               });
            $contact = new Contactus;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->phone_number = $request->phone_number;
            $contact->message = $request->message;
            $contact->save();
            
            $data=[
                'status'=>200,
                'msg'=>"Thank you for your message, you'll hear back from us shortly!",
            ];
            return response()->json($data,200);
        }
        catch(\Exception $ex){
            $data=[
                'status'=>400,
                'msg'=>$ex->getMessage(),
            ];
            return response()->json($data,400);
        }
        
    }
    protected  function getstatebycountryid(Request $request){
        extract($request->all());
        $state=State::where('country_id',$country_id)->get();
        return $state;
    }
    protected  function getcitybystateid(Request $request){
        extract($request->all());
        $city=City::where('state_id',$state_id)->get();
        return $city;
    }
}
