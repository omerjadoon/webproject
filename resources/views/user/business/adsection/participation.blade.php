@extends('layouts.app',['title'=>'Participant','request'=>'ads'])
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
                	<li class="breadcrumb-item"><a href="{{route('dashboard.index')}}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Ad section</li>
                	<li class="breadcrumb-item active">Ads Participant</li>
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
                    <h5>Current Running Ads Participant</h5>
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
                            <th>Participant User</th>
                            <th>Participant User website</th>
                            <th>Participant User Business</th>
                            <th>Leads</th>
                            <th>Total Amount</th>
                            <th>Created At</th>
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($addetail as $key=>$ad)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$ad->parti_id}}</td>
                                <td><a href="{{route('Ads.index',['ad'=>$ad->ads->id])}}">{{$ad->ads->title}}</a></td>
                                                                <td>{{strtoupper($ad->ads->type_name)}}</td>
                                <td>{{$ad->user->title.' '.$ad->user->f_name.' '.$ad->user->l_name}}</td>
                                  <td>{{$ad->user->mediadetail->website_link}}</td>
 <td>{{$ad->user->mediadetail->buisness_name}}</td>
                            <td><a @if($ad->participationhasmanyleads->count()>0) href="{{route('leads.index',['p_id'=>$ad->id])}}" @endif>{{$ad->participationhasmanyleads->count()}}</a></td>
                            <td><b>{{$ad->participationhasmanyleads->sum('total_amount')}}</b> Cent</td>
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
                            <th>Participant User</th>
                            <th>Participant User website</th>
                            <th>Participant User Business</th>
                            <th>Leads</th>
                              <th>Total Amount</th>
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
