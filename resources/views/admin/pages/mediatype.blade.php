@extends('admin.layout.app',['request'=>'setting','innerrequest'=>'media','title'=>'Media Type'])
@push('css')
<style type="text/css">
    .btn-adi{
        text-align: center;
        padding: 5px;
        min-width: 150px;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
         <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Media Type</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{$page == 'index' ? 'Add ' : 'Edit ' }} Media Type 
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                         @include('alerts.success-alert',['ses'=>'success'])
                    @include('alerts.error-alert',['ses_name'=>'error'])
                                            <form role="form" action="{{$page == 'index' ? route('mediatype_store') :  route('mediatype_update',['id' => $mediatype->id]) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                        <div class="col-lg-4">


                                                <div class="form-group">
                                                    <!-- <label>Country Name</label> -->
                                                     
                                                    <input class="form-control" name="type" placeholder="Enter Media Type" value="{{$page == 'edit' ? $mediatype->name : ''}}{{old('type')}}">
                                                     @include('alerts.errorfield',['field'=>'type'])
                                                </div>
                                             
                                            </div>
                                            <div class="col-lg-4">


                                                <div class="form-group">
                                                    <!-- <label>Country Name</label> -->
                                                    <input class="form-control" name="format" placeholder="Enter Format with comma" data-role="tagsinput" value="{{$page == 'edit' ? $mediatype->format : ''}}{{old('format')}}">
                                                     @include('alerts.errorfield',['field'=>'format'])
                                                </div>
                                             
                                            </div>
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-default btn-adi">{{$page == 'index' ? 'Add'  :  'Update' }}</button>
                                                @if($page=='index')
                                                <button type="reset" class="btn btn-default btn-adi">Reset</button>
                                                @else
                                                 <button type="submit" class="btn btn-default btn-adi"  onclick="window.history.go(-1); return false;">cancel</button>
                                                
                                                @endif
                                            </div>
                                        
                                        </form>
                                        
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                                        <!-- /.row -->
                                         @if($page=='index')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Media Type List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Type</th>
                                                    <th>Format</th>
                                                    <th>Action(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($mediatype as $key=>$media)
                                                <tr>
                                                    <td >{{$key+1}}</td>
                                                    <td >{{$media->name}}</td>
                                                     <td >{{$media->format}}</td>
                                                    <td > 
                                                        <a href="{{route('mediatype_edit',['id' => $media->id])}}" class="ft-22"><i class="fa fa-edit"></i></a>
                                                        <a href="{{route('mediatype_del',['id' => $media->id])}}"  class="ft-22"><i class="fa fa-trash"></i></a>  
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
                    <!-- /.row -->
                    @endif
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{asset('admin/js/taginput/tagsinput.js')}}"></script>
@endpush