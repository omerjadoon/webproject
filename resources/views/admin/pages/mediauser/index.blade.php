@extends('admin.layout.app',['request'=>'user','innerrequest'=>'media','title'=>'Media Partner'])
@push('css')
<style type="text/css">
     .no-brdr{
        border: none;
        background: none;
    }
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Media Partner</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Media Partner List
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Business Name</th>
                                                    <th>Webiste</th>
                                                    <th>Action(s)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $key=>$u)
                                                <tr>
                                                    <td >{{$key+1}}</td>
                                                    <td >{{$u->title.' '.$u->f_name.' '.$u->l_name}}</td>
                                                    <td>{{$u->email}}</td>
                                                    <td>{{$u->phone}}</td>
                                                    <td>{{$u->mediadetail->buisness_name}}</td>
                                                    <td>{{$u->mediadetail->website_link}}</td>
                                                    <td>
                                                        <a href="{{route('media-partner.show',$u->id)}}" ><i class="ft-22 fa fa-eye text-info"></i></a>
                                                        <button linking="{{route('del_user',$u->id)}}" type="button" class="rem no-brdr" ><i class="ft-22 fa fa-trash text-info"></i></button>
                                                    </td>
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
                $('.rem').on('click',function(){
                swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this user detail! include Ads and many more",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      link=$(this).attr('linking');
      window.location.href=link;

  } else {
    swal("Your User data is safe!");
  }
});
               });
        </script>
        @if(Session::has('del'))
        <script>
            swal("Poof! User has been deleted!", {
      icon: "success",
    });
        </script>
        @endif
        </script>
@endpush