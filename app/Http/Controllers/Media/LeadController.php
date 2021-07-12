<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use App\{User,Country,City,State,Media_type,Business_detail,Adsection,Particapte_campaign,Lead_genrate};
use DB;
use Auth;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $data['state']=1;
        $data['lead']=Lead_genrate::with('participation');
        if(!empty($request->p_id)){
        $data['lead']=$data['lead']->where('participation_id',$request->p_id);
        $data['state']=0;
        }
        $data['lead']=$data['lead']->where('media_user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
            return view('user.media.adsection.leadindex',$data);
    }

    public function withdrawrequest(Request $request){
        $lead=Lead_genrate::findOrFail($request->l_id);
        $lead->media_comm_status=1;
        $lead->update();
        return back()->with('success','With draw request Send Successfully');
    }
    public function paymentfrombfa(Request $request){
        $lead=Lead_genrate::findOrFail($request->lead_id);
        $lead->media_comm_status=$request->col;
        $lead->update();
        return back()->with('success','With draw request Send Successfully');
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
