<?php

namespace App\Http\Controllers\Admin\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\{User,Country,City,State,Media_type,Business_detail,Adsection,Particapte_campaign};
use DB;


class BusinessadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['mediatype']=Media_type::all();
        $data['adsection']=new Adsection();
         if(!empty($request->user_id)){
        $data['adsection']=$data['adsection']->where('user_id',$request->user_id);    
        }
        if(!empty($request->adquery)){
        $data['adsection']=$data['adsection']->where('title','like','%' .$request->adquery.'%');
        }
        if(!empty($request->mediatype)){
        $data['adsection']=$data['adsection']->where('media_id',$request->mediatype);
        }
        if(!empty($request->ad)){
            $data['adsection']=$data['adsection']->where('id',$request->ad);   
        }
       
        $data['adsection']=$data['adsection']->orderBy('created_at','desc')->paginate(5);
         return view('admin.pages.businessuser.ads',$data);
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
