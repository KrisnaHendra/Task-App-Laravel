@extends('template')
@section('content')

<div class="content">
  <div class="col-6">
      <!-- Products -->
      <div class="block">
          <div class="block-header block-header-default">
              <h3 class="block-title">
                  <i class="fa fa-user text-muted mr-1"></i> Profile Page
              </h3>
              <div class="block-options">
                  <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                  </button>
              </div>
          </div>
          <div class="block-content">
            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissable pb-2 pt-2" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
               <p class="mb-0"><i class="fa fa-user"></i> {!! session('message') !!}</p>
           </div>
            @endif
              <div class="row text-center">
                <img class="img-thumbnail offset-5" src="{{ URL::asset('assets/admin/') }}/assets/media/avatars/avatar10.jpg" alt="Profile" style="width: 100px;">
              </div>
              <form action="{{ url('profile/update') }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <!-- Name -->
                <div class="form-group row mt-2 pb-0 mb-0">
                  <label for="name" class="col-sm-2 col-form-label-sm ">Name</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" class="js-maxlength form-control form-control-sm form-control-alt" name="name" id="name" maxlength="20" value="{{Auth::user()->name}}" data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" data-placement="top" required> -->
                    <input type="text" class="form-control form-control-sm form-control-alt" name="name" id="name" maxlength="20" value="{{Auth::user()->name}}" required>
                  </div>
                </div>
                <!-- End Name -->
                <!-- Email -->
                <div class="form-group row pb-0 mb-0">
                  <label for="email" class="col-sm-2 col-form-label-sm ">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control form-control-sm form-control-alt" name="email" id="email" value="{{Auth::user()->email}}" required>
                  </div>
                </div>
                <!-- End Email -->
                <!-- Email -->
                <div class="form-group row pb-0 mb-0">
                  <label for="password" class="col-sm-2 col-form-label-sm ">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control form-control-sm form-control-alt" name="password" id="password" value="">
                  </div>
                  <label for="password" class="offset-2 col-10 text-danger" style="font-size:12px">*Kosongi password jika tidak diubah</label>
                </div>
                <!-- End Email -->
                <!-- Role -->
                <div class="form-group row pb-0 mb-0">
                  <label for="role" class="col-sm-2 col-form-label-sm ">Role</label>
                  <div class="col-sm-10">
                    @if(Auth::user()->role_id==1)
                    <input type="text" class="form-control form-control-sm form-control-alt is-valid" id="role" value="Administrator" disabled>
                    @endif
                    @if(Auth::user()->role_id==2)
                    <input type="text" class="form-control form-control-sm form-control-alt is-valid" id="role" value="Karyawan" disabled>
                    @endif
                  </div>
                </div>
                <!-- End Role -->
                <!-- Dibuat -->
                <div class="form-group row pb-0 mb-0">
                  <label for="created" class="col-sm-2 col-form-label-sm ">Dibuat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm form-control-alt is-valid" id="created" value="{{Auth::user()->created_at}}" disabled>
                  </div>
                </div>
                <!-- End Dibuat -->
                <button class="btn btn-sm btn-success offset-10 col-2 text-center mb-2" type="submit" name="button" style="width:100%" onClick="return confirm('Ana yakin akan mengubah profile?')"><i class="fa fa-save"></i> Save</button>
              </form>
          </div>
      </div>
      <!-- END Products -->

  </div>
</div>

@endsection
