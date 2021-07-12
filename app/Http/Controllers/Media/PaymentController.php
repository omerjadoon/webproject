<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\{User,Country,City,State,Media_type,Media_detail,Payment_detail};
use DB;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->mediadetail->payment_detail==0)
            return view('user.media.paymentsection.store');
        else
            return view('user.media.paymentsection.index');
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
            'type'=>'required',
        ]);
        if($request->type=='bank'){
            $this->validate($request,[
                'bank_name'=>'required',
                'bank_address'=>'required',
                'account_no'=>'required',
                'account_title'=>'required',
                'routing_no'=>'required',
            ]);
            extract($request->all());
            try{
                $pdetail=new Payment_detail();
                $pdetail->type=$type;
                $pdetail->user_id=Auth::user()->id;
                $pdetail->bank_name=$bank_name;
                $pdetail->bank_address=$bank_address;
                $pdetail->account_no=$account_no;
                $pdetail->account_title=$account_title;
                $pdetail->routing_no=$routing_no;
                $pdetail->save();
                $mdetail=Media_detail::where('user_id',Auth::user()->id)->first();
                $mdetail->payment_detail=1;
                $mdetail->update();

                return back()->with('success','inserted successfully');


            }catch(\Exception $ex){
                return back()->with('error',$ex->getMessage());
            }
        }else if($request->type=='paypal'){
            $this->validate($request,[
                'paypal_user_id'=>'required',
                'paypal_venmo'=>'required',
                'paypal_user_mail'=>'required',
            ]);
            extract($request->all());
            try{
                $pdetail=new Payment_detail();
                $pdetail->type=$type;
                $pdetail->user_id=Auth::user()->id;
                $pdetail->paypal_user_id=$paypal_user_id;
                $pdetail->paypal_venmo=$paypal_venmo;
                $pdetail->paypal_user_mail=$paypal_user_mail;
                $pdetail->save();
                $mdetail=Media_detail::where('user_id',Auth::user()->id)->first();
                $mdetail->payment_detail=1;
                $mdetail->update();
                return back()->with('success','inserted successfully');

            }catch(\Exception $ex){
                return back()->with('error',$ex->getMessage());
            }
        }else if($request->type=='contact_person'){
            $this->validate($request,[
                'contact_person_name'=>'required',
                'contact_person_title'=>'required',
                'contact_person_number'=>'required',
                'contact_person_email'=>'required',
            ]);
            extract($request->all());
            try{
                $pdetail=new Payment_detail();
                $pdetail->type=$type;
                $pdetail->user_id=Auth::user()->id;
                $pdetail->contact_person_name=$contact_person_name;
                $pdetail->contact_person_title=$contact_person_title;
                $pdetail->contact_person_number=$contact_person_number;
                $pdetail->contact_person_email=$contact_person_email;
                $pdetail->save();
                $mdetail=Media_detail::where('user_id',Auth::user()->id)->first();
                $mdetail->payment_detail=1;
                $mdetail->update();
                return back()->with('success','inserted successfully');

            }catch(\Exception $ex){
                return back()->with('error',$ex->getMessage());
            }
        }


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
