<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\{User,Country,City,State,Media_type,Business_detail,Adsection,Particapte_campaign,Lead_genrate,Media_detail};
use DB;

use Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.media.dashboard');
    }
        public function account_setting(Request $request){
        $data['country']=Country::orderBy('created_at', 'desc')->get();
            return view('user.media.account',$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>['required'],
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'buisness_name' => ['required', 'string', 'max:191'],
            'address' => ['required', 'string', 'min:20','max:191'],
            'phone'=>['required', 'string','max:15'],
            'city'=>['required'],
            'zip_code'=>['required'],
            'website_link'=>['required'],
            'additional_no'=>['required'],
        ]);

          
        try{
            $user=Auth::user();
            $user->title=$request->title;
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->address = $request->address;
            $user->city_id=$request->city;
            $user->zip_code=$request->zip_code;
            $user->phone = $request->phone;
            if($request->has('profile')){
                    $image=$request->file('profile');
                    $extension = $image->getClientOriginalExtension();
                    $filename = uniqid().'.'.$extension;
                   // Storage::disk('users')->put($filename,file_get_contents($image));
                    $path = Storage::disk('s3')->put('profileImages/'.$filename,file_get_contents($image), 'public');
                    $filepath=Storage::disk('s3')->url('profileImages/'.$filename);
                    $user->file_name=$filename;
                    $user->file_path=$filepath;
                   
                }    
            $user->update();
             $media_detial=Media_detail::findOrFail(Auth::user()->mediadetail->id);
                $media_detial->website_link=$request->website_link;
                $media_detial->buisness_name=$request->buisness_name;
                $media_detial->additional_no=$request->additional_no;  
                $media_detial->size=$request->size;
                $media_detial->m_type=$request->m_type;
                $media_detial->day=$request->day;
                $media_detial->time=$request->time;
                $media_detial->update(); 
                return back()->with('success','Profile Updated Successfully');

        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
