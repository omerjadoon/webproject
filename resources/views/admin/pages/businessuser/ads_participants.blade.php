@extends('admin.layout.app',['request'=>'ads','innerrequest'=>'viewallparticipant','title'=>'Ad Particpants'])
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
                                    Ad Particpants List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                               <th>#</th>
                                                 <th>Participation Id</th>
                                                <th>Particpant User</th>
                            <th>Ad Title</th>
                            <th>Ad Type</th>
                            <th>Posted User</th>
                            <th>Leads</th>
                            <th>Created At</th>
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($addetail as $key=>$ad)
                            <tr>
                                <td>{{$key+1}}</td>
                                      <td>{{$ad->parti_id}}</td>
                                 <td><a href="{{route('media-partner.show',$ad->user->id)}}">{{$ad->user->title.' '.$ad->user->f_name.' '.$ad->user->l_name}}</a></td>

                                <td><a href="{{route('business-ads.index',['ad'=>$ad->ads->id])}}">{{$ad->ads->title}}</a></td>
                                                                <td>{{strtoupper($ad->ads->type_name)}}</td>
                                <td><a href="{{route('business-partner.show',$ad->ads->belongtouser->id)}}">{{$ad->ads->belongtouser->title.' '.$ad->ads->belongtouser->f_name.' '.$ad->ads->belongtouser->l_name}}</a></td>

                                  <td><a @if($ad->participationhasmanyleads->count()>0) href="{{route('participant_leads',['p_id'=>$ad->id])}}" @endif>{{$ad->participationhasmanyleads->count()}}</a></td>
                                <td>{{$ad->created_at->format('d-M-Y h:i a')}}</td>

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