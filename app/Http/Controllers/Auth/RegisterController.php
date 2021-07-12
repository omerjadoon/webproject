<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mail;
use App\Notifications\Verifyuser;
use App\{Country,City,State,Media_type,Business_detail,Media_detail};
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm() {

        $data['country']=Country::orderBy('created_at', 'desc')->get();
        if(\Request::get('business')=='yes')
            return view ('auth.businessregister',$data);
        else if(\Request::get('media')=='yes')
            return view ('auth.mediaregister',$data);
            
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {  

        return Validator::make($data, [
            'title'=>['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'buisness_name' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'min:20','max:191'],
            'phone'=>['required', 'string','max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'login.*' => ['required', 'string', 'min:8'],
            'agree'=>['required'],
            'role'=>['required'],
            'city'=>['required'],
            'zip_code'=>['required'],
            'website_link'=>['required'],
            'day'=>['required'],
            'time'=>['required'],
            'size'=>['required'],
            'm_type'=>['required'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data)
    {
        
        // DB::beginTransaction();
        // try{
            $collectionItems = $data['login'];
            $user=new User();
            $user->title=$data['title'];
            $user->f_name = $data['first_name'];
            $user->l_name = $data['last_name'];
            $user->address = $data['address'];
            $user->city_id=$data['city'];
            $user->zip_code=$data['zip_code'];
            $user->phone = $data['phone'];
            $user->email = $data['email'];
            $user->password = Hash::make($collectionItems['password']);
            $user->role=$data['role'];
            $user->save();
            if($user->role=='buisness'){
                $business_detial=new Business_detail();
                $business_detial->website_link=$data['website_link'];
                $business_detial->buisness_name=$data['buisness_name'];
                $business_detial->user_id=$user->id;
                $business_detial->save();
            }
            else if($user->role=='media'){
                $media_detial=new Media_detail();
                $media_detial->website_link=$data['website_link'];
                $media_detial->buisness_name=$data['buisness_name'];
                $media_detial->user_id=$user->id;
                $media_detial->additional_no=$data['additional_no'];
                $media_detial->size=$data['size'];
                $media_detial->m_type=$data['m_type'];
                $media_detial->day=$data['day'];
                $media_detial->time=$data['time'];
                $media_detial->save(); 

            }
            return $user;
        


    }
    

}
