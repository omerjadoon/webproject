<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\{User,Country,City,State,Media_type,Business_detail,Adsection,Particapte_campaign};
use DB;
use Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function index(Request $request)
    {

        $data['mediatype']=Media_type::all();
        $data['adsection']=new Adsection();
        if(!empty($request->adtitle)){
        $data['adsection']=$data['adsection']->where('title','like','%' .$request->adtitle.'%');
        }
        if(!empty($request->mediatype)){
        $data['adsection']=$data['adsection']->where('media_id',$request->mediatype);
        }
        if(!empty($request->ad)){
            $data['adsection']=$data['adsection']->where('id',$request->ad);
        }
        $data['adsection']=$data['adsection']->orderBy('created_at','desc')->paginate(5);
         return view('user.media.adsection.index',$data);
    }
    public function participated_ad_index(Request $request)
    {
        $data['addetail']=Particapte_campaign::with('ads.belongtouser')->where('user_id',Auth::user()->id)
        ->orderBy('created_at','desc')->get();
        return view('user.media.adsection.participation',$data);
    }
    public function download_media(Request $request){
        $file=Adsection::findOrFail($request->id);
        $name=$file->file_name;
        return response()->download(storage_path('app/public/adsections/'.$name));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $getdetail=Adsection::findOrFail($request->id);
        if($getdetail){
            $login=Auth::user()->id;
            $adposted=$getdetail->user_id;
            $adid=$request->id;
           
            $exist=Particapte_campaign::where('user_id',Auth::user()->id)->where('ad_id',$adid)->first();
            if(!$exist){
                $participat=new Particapte_campaign();
                $participat->parti_id=$this->generatePin();
                $participat->user_id=Auth::user()->id;
                $participat->posted_ad_user_id=$adposted;
                $participat->ad_id=$adid;
                $participat->save();
                $st='save';
                $participation_id=$participat->id;
            }else{
                $participation_id=$exist->id;
                 $st='noaction';
            }
            $url=route('particapte',[\Crypt::encrypt($login),\Crypt::encrypt($adposted),\Crypt::encrypt($adid),\Crypt::encrypt($participation_id)]);
            $file=asset($getdetail->file_path);
            if($request->type_name=='video'){
                $html='<a href="'.$url.'"><video class="" src="'.$file.'" width="100%" height="100%" alt="gallery" controls controlsList="nodownload"></video></a>';
            }else if($request->type_name=='image'){
                $html='<a href="'.$url.'"><img class="" width="100%" height="100%" src="'.$file.'" alt="gallery"></a>';
            }
            else if($request->type_name=='document'){
                $html='<a href="'.$url.'" style="position:relative; display:inline-block;"><div class="blocker" style="position:absolute; height:100%; width:95%; z-index:1;"></div><iframe  class="" src="'.$file.'" width="100%" height="100%" alt="doc"></iframe></a> ';
            }
            else if($request->type_name=='audio'){
                $html='<a href="'.$url.'" style="position:relative; display:inline-block;">
                    <div class="blocker" style="margin-left: 38px;position:absolute;height:100%;width: 74%; z-index:1;"></div><audio class="" width="100%" height="100%"  controls autoplay loop controlsList="nodownload" ><source src="'.$file.'"></audio></a>';
            }
            
            
            $data=[
                'status'=>200,
                'html'=>$html,
                'title'=>$getdetail->title,
                'msg'=>$st,
            ];
                    return json_encode($data,200);


        }else{
            $data=['status'=>'500','html'=>'data not found something went wrong'];
            return json_encode($data,500);

        }
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
        //
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
