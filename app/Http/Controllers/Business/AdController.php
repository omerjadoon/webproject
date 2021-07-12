<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function index(Request $request)
    {
        $data['mediatype']=Media_type::all();
        $data['adsection']=Adsection::where('user_id',Auth::user()->id);
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
          return view('user.business.adsection.index',$data);
    }
    public function ad_participants(Request $request){
        $data['addetail']=Particapte_campaign::with('ads.belongtouser')->where('posted_ad_user_id',Auth::user()->id)
        ->orderBy('created_at','desc')->get();
        return view('user.business.adsection.participation',$data);   
    }
    public function uploadadindex()
    {
          $data['mediatype']=Media_type::all();
          return view('user.business.adsection.store',$data);
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

        $this->validate($request,[
            'adtitle'=>'required',
            'mediatype'=>'required',
            'ads'=>['required','max:1000'],
            ]);
        try{
            $mediatype=Media_type::findOrFail($request->mediatype);

            if($request->has('ads')){
                $image=$request->file('ads');
                $extension = $image->getClientOriginalExtension();
                $filename = 'user-'.Auth::user()->id.'00ads-'.uniqid().''.time().'.'.$extension;
                //Storage::disk('adsections')->put($filename,file_get_contents($image));
                //$filepath='storage/adsections/'.$filename;
                // Storage::disk('ftp')->put($filename, fopen($request->file('ads'), 'r+'));
                    //$filepath=storage::disk('ftp')->url($filename);
                  $path = Storage::disk('s3')->put('Adsection/'.$filename,file_get_contents($image), 'public');
                    $filepath=Storage::disk('s3')->url('Adsection/'.$filename);
            }       
            $ads=new Adsection();
            $ads->user_id=Auth::user()->id;
            $ads->media_id=$request->mediatype;
            $ads->title=$request->adtitle;
            $ads->file_name=$filename;
            $ads->file_path=$filepath;
            $ads->type_name=$mediatype->name;
            $ads->file_extension=$extension;
            $ads->save();
        }catch(\Exception $ex){
              // Storage::delete('public/adsections/'.$filename);
            return back()->with('error',$ex->getMessage());
        }
        return redirect()->route('Ads.index')->with('success','Ads Uploaded Successfully');
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
        $data['mediatype']=Media_type::all();
        $data['ad']=Adsection::findOrFail($id);
        return view('user.business.adsection.edit',$data);
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
            'adtitle'=>'required',
            'mediatype'=>'required',
            ]);
        try{
            $mediatype=Media_type::findOrFail($request->mediatype);
             $ads=Adsection::findOrFail($id);
            if($request->has('ads')){
                //Storage::delete('public/adsections/'.$ads->file_name);
                $image=$request->file('ads');
                $extension = $image->getClientOriginalExtension();
                               $filename = 'user-'.Auth::user()->id.'00ads-'.uniqid().''.time().'.'.$extension;
                //Storage::disk('adsections')->put($filename,file_get_contents($image));
                //$filepath='storage/adsections/'.$filename;
                 Storage::disk('ftp')->put($filename, fopen($request->file('ads'), 'r+'));
                    $filepath=storage::disk('ftp')->url($filename);
                $ads->file_name=$filename;
                $ads->file_path=$filepath;
                $ads->type_name=$mediatype->name;
                $ads->file_extension=$extension;
            }       
            $ads->media_id=$request->mediatype;
            $ads->title=$request->adtitle;
            $ads->update();
        }catch(\Exception $ex){
              Storage::delete('public/adsections/'.$filename);
            return back()->with('error',$ex->getMessage());
        }
        return redirect()->route('Ads.index')->with('success','Ads Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {     
        $ads=Adsection::findOrFail($id);
        Storage::delete('public/adsections/'.$ads->file_name);
        if($ads->delete()){
            $data=[
                'status'=>200,
                'url'=>route('Ads.index'),
            ];            
        }else{
            $data=[
                'status'=>500,
            ];
        }
        return $data;

    }
    public function get_format(Request $request)
    {
        $m=Media_type::findOrFail($request->media_id);
        return $m->format;
    }
}
