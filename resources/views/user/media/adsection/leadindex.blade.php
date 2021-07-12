@extends('layouts.app',['title'=>'Lead','request'=>'lead'])
@push('css')
<style type="text/css">
	.custom{
		margin-top: 5px;
	}
  
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Ad section</h3>
            </div>
            <div class="col-6">
            	<ol class="breadcrumb">
                	<li class="breadcrumb-item"><a href="{{route('media_dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ad section</li>
                	<li class="breadcrumb-item active">Leads</li>
                </ol>
            </div>
        </div>
    </div>
</div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                     @if($lead->count()>0 && $state==0)
                   <div class="row">
                                <div class="col-md-4">

                                <h5>{{$lead->first()->participation->ads->title}}</h5>
                                                <span><b> Posted By: </b>{{$lead->first()->participation->ads->belongtouser->title.' '.$lead->first()->participation->ads->belongtouser->f_name.' '.$lead->first()->participation->ads->belongtouser->l_name}}</span>
                              </div>
                              <div class="col-md-4 text-center">
                            <b>{{$lead->first()->participation->parti_id}}</b>
                              </div>
                              <div class="col-md-4 text-right">
                                <b>{{$lead->first()->participation->created_at->format('Y M,d h:i a')}}</b>
                              </div>
                            </div>
                            @else
                            <h5>Lead List</h5>

                            @endif
                  </div>
                  <div class="card-body">
                    <div class="dt-ext table-responsive">
                      <table class="display" id="export-button">
                        <thead>
                          <tr>
                            <th>#</th>
                              @if($state==1)<th>Participation ID</th>@endif
                            <th>Lead ID</th>
                            <th>Commission Owed</th>
                            <th>Commission Status</th>
                            <th>Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($lead as $key=>$lead)
                           <tr>
                            <td>{{$key+1}}</td>
                               @if($state==1)<td>{{$lead->participation->parti_id}}</td>@endif
                            <td>{{$lead->lead_id}}</td>
                            <td><b>{{$lead->media_commission_owned}}</b> Cent</td>
                            <td class="text-center">
                            @if($lead->bfa_tot_status==3)
                             @if($lead->media_comm_status == 0)
                               <button class="btn btn-info withdrawrequest" type="button" action="{{route('withdrawrequest',['l_id'=>$lead->id])}}" leadid="{{$lead->id}}">
                                Withdraw </button>
                              @elseif($lead->media_comm_status==1)
                              <span class="badge badge-primary">Waiting for approval</span>
                             @elseif($lead->media_comm_status==2)
                            <div class="badge badge-warning">Payment Receive?</div>
                             <div><a href="{{route('paymentfrombfa',['lead_id'=>$lead->id,'col' => 4])}}"><i class="fa fa-check fa-2x"></i></a><a href="{{route('paymentfrombfa',['lead_id'=>$lead->id,'col' => 5])}}"><i class="fa fa-remove fa-2x"></i></a></div>
                             @elseif($lead->media_comm_status==3)
                              <div class="badge badge-danger ">Rejected</div>
                                  <div><button class="btn btn-info withdrawrequest" type="button" action="{{route('withdrawrequest',['l_id'=>$lead->id])}}" leadid="{{$lead->id}}">
                                Request Again </button></div>
                              @elseif($lead->media_comm_status==4)
                               <span class="badge badge-success">Received</span>
                              @elseif($lead->media_comm_status==5)
                                   <span class="badge badge-danger">Not Received</span>
                             @endif
                            @else
                            <span class="badge badge-primary">Waiting</span>
                            @endif
                          </td>
                              <td>{{$lead->created_at->format('d-M-Y h:i a')}}</td>
                          </tr>
                          @endforeach
                                               
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>#</th>
                            @if($state==1)<th>Participation ID</th>@endif
                            <th>Lead ID</th>
                            <th>Commision Owed</th>
                            <th>Commission Status</th>
                            <th>Created At</th>
                            
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
@endsection
@push('js')
<script type="text/javascript">
   $('.withdrawrequest').on('click', function(){
    lead_id=$(this).attr('leadid');

                swal({
                    title: "Are you sure?",
                    text: "Once Request, you will not be able to recover this Withdraw Request!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href=$(this).attr('action');   
                    } else {
                        swal("Your Withdraw Request is safe!");
                    }
                })
        });
</script>
@endpush
