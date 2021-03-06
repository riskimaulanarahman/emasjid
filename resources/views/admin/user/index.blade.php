@extends('layouts.backend')
@section('content')


<div class="row">
    
    <div class="btn">
        <a href="/user/add" type="button" class=" btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
     </div>
    <div class="col-lg-12 mb-4">
        <div class="card bg-primary text-white shadow">
            <div class="card-header bg-primary" > User </div> 
        </div>
       <!-- Topbar Search -->
       
<!--  -->
            <br>
        <form class="form-inline my-4 my-lg-0" method="get" action="{{ url('user') }}">
            <input class="form-control ml-auto mr-2" type="text" value="{{ $keyword}}" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert alert-success" role="alert">
                   {{session('pesan')}}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr >
                            <th width="30px" class="text-center">No</th>
                            <th class="text-center" width="50px">Nama User</th>
                            <th width="50px" class="text-center">Email</th>
                            <th width="100px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key => $data)
                        <tr>
                            <td class="text-center" >{{ $user->firstItem() + $key}}</td>
                            <td >{{ $data ->name}}</td>
                            <td >{{ $data ->email}}</td>
                            <td class="text-center">
                                <a href="/user/edit/{{$data->id}}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                                <button  class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{$data->id}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                
             </div>
             {{$user->links()}}
            </div>
    </div>
</div>

@foreach ($user as $data)
    <div class="modal fade" id="delete{{$data->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title" style="color: red">{{$data->name}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="color: black">
              <p>Apakah anda ingin menghapus data {{$data->name}} ??</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Keluar</button>
              <a href="/user/delete/{{$data->id}}" type="button" class="btn btn-outline-light">Ya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endforeach


@endsection