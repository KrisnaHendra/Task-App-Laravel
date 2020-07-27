@extends('template')
@section('content')

<div class="content">

  <div class="col-12">
      <!-- Default Table -->
      <div class="block">
          <div class="block-header">
              <h3 class="block-title">Data Karyawan</h3>
              <div class="block-options">
                  <div class="block-options-item">
                      @if(Auth::user()->role_id == 1)
                      <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus"></i></a>
                      @endif
                  </div>
              </div>
          </div>
          <hr class="mt-0 mb-0">
          <div class="block-content mt-0">
            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissable" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
               <p class="mb-0">{!! session('message') !!}</p>
           </div>
            @endif
            @if (Session::has('sweet_alert.alert'))
            <script>
              swal({!! Session::get('sweet_alert.alert') !!});
            </script>
            @endif

              <table class="table table-vcenter table-sm table-hover table-striped js-dataTable-full">
                  <thead>
                      <tr class="bg-info text-white">
                          <th class="text-center pl-0 pr-0" style="width: 7%;">#</th>
                          <th style="width: 25%;">Name</th>
                          <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                          <th class="d-none d-sm-table-cell" style="width: 20%;">Hak Akses</th>
                          @if(Auth::user()->role_id == 1)
                          <th class="text-center" style="width: 100px;">Actions</th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($karyawan as $no => $k)
                      <tr>
                          <th class="text-center pl-0 pr-0" style="width: 7%;">{{ ++$no }}</th>
                          <td class="font-w600 font-size-sm">
                              <!-- <a href="">{{ $k->name }}</a> -->
                              {{ $k->name }}
                          </td>
                          <td class="d-none d-sm-table-cell">
                              <!-- <span class="badge badge-info">Business</span> -->
                              {{ $k->email }}
                          </td>
                          <td>
                            @if($k->role_id==1)
                            <span class="badge badge-primary">{{ $k->role }}</span>
                            @endif
                            @if($k->role_id==2)
                            <span class="badge badge-warning">{{ $k->role }}</span>
                            @endif
                          </td>
                          @if(Auth::user()->role_id == 1)
                          <td class="text-center">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-sm btn-info pt-0 pb-0" data-toggle="tooltip" title="Edit">
                                      <a href="" data-toggle="modal" data-target="#update{{ $k->id }}"><i class="fa fa-fw fa-pencil-alt text-white"></i></a>
                                  </button>
                                  <button type="button" class="btn btn-sm btn-danger pt-0 pb-0" data-toggle="tooltip" title="Remove">
                                      <a href="/karyawan/hapus/{{ $k->id }}" onClick="return confirm('Hapus data ini?')"><i class="fa fa-fw fa-times text-white"></i></a>
                                  </button>
                              </div>
                          </td>
                          @endif

                      </tr>
                      @endforeach

                  </tbody>
              </table>
          </div>
      </div>
      <!-- END Default Table -->
  </div>

</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('karyawan') }}" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text bg-primary text-white font-weight-bold" style="width: 92px">Name</span>
            </div>
            <input type="text" class="js-maxlength form-control" name="name" maxlength="20" placeholder="Name" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" data-placement="top" >
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text bg-primary text-white font-weight-bold" style="width: 92px">Email</span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="Email" >
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text bg-primary text-white font-weight-bold" style="width: 92px">Password</span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password" >
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <label class="input-group-text bg-primary text-white font-weight-bold" style="width: 92px">Status</label>
            </div>
            <select class="custom-select" name="role_id">
              <option value="">Pilih...</option>
              <option value="1">Administrator</option>
              <option value="2">Karyawan</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL TAMBAH -->

<!-- MODAL UPDATE -->
@foreach($karyawan as $no => $k)
<div class="modal fade" id="update{{$k->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Karyawan {{$k->id}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('karyawan/update') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$k->id}}">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text bg-info text-white font-weight-bold" style="width: 92px">Name</span>
            </div>
            <input type="text" class="js-maxlength form-control" name="name" maxlength="20" value="{{$k->name}}" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" data-placement="top" required>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text bg-info text-white font-weight-bold" style="width: 92px">Email</span>
            </div>
            <input type="email" class="form-control" name="email" value="{{$k->email}}" required>
          </div>
          <div class="input-group mb-2 mt-1">
            <div class="input-group-prepend">
              <label class="input-group-text bg-info text-white font-weight-bold" style="width: 92px">Status</label>
            </div>
            <select class="custom-select" name="role_id">
              <!-- <option value="">Pilih...</option> -->
              <option selected="{{$k->role_id}}" value="{{$k->role_id}}">{{$k->role}}</option>
              @foreach($role as $r)
              <option value="{{$r->id}}">{{$r->role}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <span class="input-group-text bg-info text-white font-weight-bold" style="width: 92px">Password</span>
            </div>
            <input type="password" class="form-control" name="password">
            <span class="col-12 text-danger" style="font-size:13px;">*Kosongi password jika tidak diubah</span>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- END MODAL UPDATE -->
@include('sweet::alert')
@endsection
