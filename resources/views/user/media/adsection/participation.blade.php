@extends('layouts.app',['title'=>'Participated Ads','request'=>'ads'])
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
                	<li class="breadcrumb-item active">Participated Ads</li>
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
                    <h5>Current Running Ads</h5>
                  </div>
                  <div class="card-body">
                    <div class="dt-ext table-responsive">
                      <table class="display" id="export-button">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Participation Id</th>
                            <th>Ad Title</th>
                            <th>Ad Type</th>
                            <th>Posted User</th>
                            <th>Leads</th>
                            <th>Total Commision Owed</th>
                            <th>Created At</th>
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($addetail as $key=>$ad)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$ad->parti_id}}</td>
                                <td><a href="{{route('ad-detail.index',['ad'=>$ad->ads->id])}}">{{$ad->ads->title}}</a></td>
                                                                <td>{{strtoupper($ad->ads->type_name)}}</td>
                                <td>{{$ad->ads->belongtouser->title.' '.$ad->ads->belongtouser->f_name.' '.$ad->ads->belongtouser->l_name}}</td>

                                <td><a @if($ad->participationhasmanyleads->count()>0) href="{{route('media_lead.index',['p_id'=>$ad->id])}}" @endif>{{$ad->participationhasmanyleads->count()}}</a></td>
                                <td><b>{{$ad->participationhasmanyleads->sum('media_commission_owned')}}</b> Cent</td>
                                <td>{{$ad->created_at->format('d-M-Y h:i a')}}</td>

                            </tr>
                        @endforeach                            
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>#</th>
                              <th>Participation Id</th>
                            <th>Ad Title</th>
                             <th>Ad Type</th>
                            <th>Posted User</th>
                            <th>Leads</th>
                             <th>Total Commision Owed</th>
                            <th>Created At</th>
                            <!-- <th>Action</th> -->
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
@endpush
