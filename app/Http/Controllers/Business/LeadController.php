<?php

namespace App\Http\Controllers\Business;

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
        $data['lead']=$data['lead']->where('business_user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
         
            return view('user.business.adsection.leadindex',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendpaymenttobfa(Request $request){
        
        $lead=Lead_genrate::findOrFail($request->l_id);
        $lead->bfa_tot_status=2;
        $lead->update();
        return redirect()->back()->with('success','You Have Send Payment of Lead #'.$lead->lead_id);
    }
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
