@extends('admin.layout.app',['request'=>'ads','innerrequest'=>'lead','title'=>'Ad Leads'])
@push('css')
<style type="text/css">
    
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ad Particpants</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    @if($lead->count()>0 && $state==0)
                   <div class="row">
                                <div class="col-md-4">
                                     <h5><b> Participated By: </b>{{$lead->first()->participation->user->title.' '.$lead->first()->participation->user->f_name.' '.$lead->first()->participation->user->l_name}}</h5>
                                
                                                <span><b> Posted By: </b>{{$lead->first()->participation->ads->belongtouser->title.' '.$lead->first()->participation->ads->belongtouser->f_name.' '.$lead->first()->participation->ads->belongtouser->l_name}}</span>
                                                
                              </div>
                              <div class="col-md-4 text-center">
                                   <h5>{{$lead->first()->participation->ads->title}}</h5>
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
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                               <tr>
                            <th>#</th>
                            @if($state==1)<th>Participation ID</th>@endif
                            <th>Lead ID</th>
                            <th>Total Amount</th>
                              <th>Admin Commission</th>
                                <th>Participant Commission</th>
                                <th>Commision Status</th>
                                <th>Payement Status</th>
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
                              <td><b>{{$lead->bfa_commission_owned}}</b> Cent</td>
                                <td><b>{{$lead->media_commission_owned}}</b> Cent</td>
                                <td class="text-center">
                                @if($lead->bfa_tot_status==3)
                                    @if($lead->media_comm_status==0)
                                        <span class="badge badge-info">Waiting</span>
                                    @elseif($lead->media_comm_status==1)
                                         <div> <span class="badge badge-warning">Withdraw Requested? </span></div>
                                        <a href="{{route('actionwithdrawrequest',['lead_id'=>$lead->id,'col' => 2])}}"><i class="fa fa-check fa-2x"></i></a><a href="{{route('actionwithdrawrequest',['lead_id'=>$lead->id,'col' => 3])}}"><i class="fa fa-remove fa-2x"></i></a>
                                    @elseif($lead->media_comm_status==2)
                                    <span class="badge badge-warning">Confirmation Pending</span>
                                    @elseif($lead->media_comm_status==3)
                                        <span class="badge badge-danger">Request Declined</span>
                                    @elseif($lead->media_comm_status==4)
                                    <span class="badge badge-success">Payment Confirmed</span>
                                    @elseif($lead->media_comm_status==5)  
                                     <div> <span class="badge badge-danger">Payment not Receive </span></div>
                                   <a href="{{route('actionwithdrawrequest',['lead_id'=>$lead->id,'col' => 2])}}">Send Again</a>
                                    @endif
                                @else
                                    <span class="badge badge-primary">Not Eligible</span>
                                @endif    
                                </td>
                                 <td class="text-center">
                               @if($lead->bfa_tot_status==1)
                                    <span class="badge badge-info">Waiting</span>
                                @elseif($lead->bfa_tot_status==2)
                                   <div> <span class="badge badge-warning">Payment Receive? </span></div>
                                  <a href="{{route('paymentfrombusiness',['lead_id'=>$lead->id,'col' => 3])}}"><i class="fa fa-check fa-2x"></i></a><a href="{{route('paymentfrombusiness',['lead_id'=>$lead->id,'col' => 4])}}"><i class="fa fa-remove fa-2x"></i></a>
                                  @elseif($lead->bfa_tot_status==3)
                                    <span class="badge badge-success">Received</span>
                                   @elseif($lead->bfa_tot_status==4)
                                    <span class="badge badge-danger">Not Received</span>
                              @endif
                                </td>
                              <td>{{$lead->created_at->format('d-M-Y h:i a')}}</td>
                          </tr>
                          @endforeach
                                                     
                        </tbody>
                                            
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                  
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
   </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@push('js')
<script>

                            $('#dataTables-example').DataTable({
                        responsive: true
                });
        </script>
@endpush