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
                    <li class="breadcrumb-item"><a href="{{route('participants')}}">Participated Ad</a></li>
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
                                                <span><b> Participated By: </b>{{$lead->first()->participation->user->title.' '.$lead->first()->participation->user->f_name.' '.$lead->first()->participation->user->l_name}}</span>
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
                            <th>Total Amount</th>
                            
                            <th>Payment Status</th>
                            <th>Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($lead as $key=>$lead)
                           <tr>
                            <td>{{$key+1}}</td>
                            @if($state==1)<td>{{$lead->participation->parti_id}}</td>@endif
                            <td>{{$lead->lead_id}}</td>
                            <td><b>{{$lead->total_amount}}</b> Cent</td>

                             
                           
                              @if($lead->bfa_tot_status==1)
                                <td class="text-center">
                              <button class="btn btn-info sendpaymenttobfa" type="button" action="{{route('sendpaymenttobfa',['l_id'=>$lead->id])}}" leadid="{{$lead->id}}">
                                Send </button></td>
                                @elseif($lead->bfa_tot_status==2)
                              <td class="text-center">
                                  <span class="badge badge-warning ">Confirmation Pending</span>
                                 <!--  <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ml-2"></i></div> -->
                                </td>
                                 @elseif($lead->bfa_tot_status==3)
                              <td class="text-center">
                                  <span class="badge badge-success ">Payment Confirmed</span>
                                 <!--  <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ml-2"></i></div> -->
                                </td>
                                 @elseif($lead->bfa_tot_status==4)
                              <td class="text-center">
                                  <div class="badge badge-danger ">Payment Not Confirmed</div>
                                  <div><button class="btn btn-info sendpaymenttobfa" type="button" action="{{route('sendpaymenttobfa',['l_id'=>$lead->id])}}" leadid="{{$lead->id}}">
                                Send Again </button></div>
                                
                                </td>
                              @endif
                               <td>{{$lead->created_at->format('d-M-Y h:i a')}}</td>
                           
                          </tr>
                          @endforeach
                                               
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>#</th>
                           @if($state==1)<th>Participation ID</th>@endif
                            <th>Lead ID</th>
                            <th>Total Amount</th>
<th>Payment Status</th>
                            
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
   $('.sendpaymenttobfa').on('click', function(){
    lead_id=$(this).attr('leadid');

                swal({
                    title: "Are you sure?",
                    text: "Once Send, you will not be able to recover this Payment!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href=$(this).attr('action');   
                    } else {
                        swal("Your Payment is safe!");
                    }
                })
        });
</script>
@endpush
