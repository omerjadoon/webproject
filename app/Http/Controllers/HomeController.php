<?php

namespace App\Http\Controllers;      

use Illuminate\Http\Request;
use Mail;
use App\{User,Country,City,State,Media_type,Business_detail};
use DB,Hash;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role=='media'){
            return redirect()->route('media_dashboard.index');
        }else if(Auth::user()->role=='buisness'){
            if(Auth::user()->businessdetail->agreement_status==1){
                 return redirect()->route('dashboard.index');
            }
            return view('user.business.home');
        }

    }
    public function businessstore(Request $request){
        $this->validate($request,[
               'nature_of_buisness'=>['required','string'],
               'recent_campaigns'=>['required','string'],
               'industry_name' =>['required','string'],
               'detail_of_buisness' =>['required','string', 'min:20','max:500'],
        ]);
        extract($request->all());
        try{
            $data=Business_detail::findOrFail(Auth::user()->businessdetail->id);
            $data->nature_of_buisness=$nature_of_buisness;
            $data->recent_campaigns=$recent_campaigns;
            $data->industry_name=$industry_name;
            $data->detail_of_buisness=$detail_of_buisness;
            $data->agreement_status=1;
            $data->update();
            return redirect()->route('dashboard.index');
        }
        catch(\Exception $ex){
            return back()->with('error',$ex->getMessage());
        }
    }
    public function change_password(Request $request){
        return view('auth.passwords.changepass');
    }
     public function change_passwordstore(Request $request){

           $this->validate($request,[
               'password'=>['required','string'],
               'password'=>['required','string'],
               'password_confirmation' =>['required','string'],
            
            ]);
         try{  
            if(Hash::check($request->oldpassword,Auth::user()->password)){
                    $user = Auth::user();
                    $user->password =Hash::make($request->password);
                    $user->update(); 
                return back()->with('success','Password Updated Successfully');
            }else{
                return back()->with('error',"old Password doesn't match");
            }
        }   
         catch(\Exception $ex){
            return back()->with('error',$ex->getMessage());
        }

    }
    
    
}