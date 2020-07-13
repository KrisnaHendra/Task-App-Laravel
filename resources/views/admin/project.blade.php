@extends('template')
@section('content')

<div class="content">

  <div class="col-12">
      <!-- Small Table -->
      <div class="block mt-0 pt-0">
          <div class="block-header">
              <h3 class="block-title">Daftar Project</h3>
              <div class="block-options">
                  <div class="block-options-item">
                      <a href="#" class="btn btn-sm btn-primary font-size-sm" data-toggle="modal" data-target="#modal-block-fromright"><i class="fa fa-plus-circle"></i></a>
                  </div>
              </div>
          </div>
          <hr class="mt-0 pb-0">
          <div class="block-content mt-0 pt-0">
            @if (Session::has('message'))
            <div class="alert alert-success alert-dismissable" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
               <p class="mb-0"><i class="fa fa-check"></i> {!! session('message') !!}</p>
           </div>
            @endif
          
            @if (Session::has('sweet_alert.alert'))
            <script>
              swal({!! Session::get('sweet_alert.alert') !!});
            </script>
            @endif

              <table class="table table-sm table-vcenter table-hover">
                  <thead>
                      <tr class="font-weight-bold bg-secondary text-light">
                          <td>#</td>
                          <td>Nama</td>
                          <td>Dibuat Pada</td>
                          <td class="text-right">Action</td>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($project as $no => $p)
                      <tr class="pb-0 pt-0 mb-0 mt-0" style="font-size:14px" ondblclick="return confirm('{{$p->nama}}')">
                          <td scope="row">{{ ++$no }}</td>
                          <td>{{ $p->nama }}</td>
                          <td>{{ date('d F Y',$p->created_at) }}</td>
                          <td class="text-right">
                              <div class="btn-group">
                                  <button type="button" class="btn btn-sm btn-info js-tooltip-enabled pb-0 pt-0" data-toggle="tooltip" title="Update">
                                      <a href="#" data-toggle="modal" data-target="#update{{$p->id}}"><i class="fa fa-fw fa-pencil-alt text-white"></i></a>
                                  </button>
                                  <button type="button" class="btn btn-sm btn-danger js-tooltip-enabled pb-0 pt-0" data-toggle="tooltip" title="Hapus">
                                      <a href="/project/hapus/{{ $p->id }}" onClick="return confirm('Hapus Project Ini?')"><i class="fa fa-fw fa-times text-white"></i></a>
                                  </button>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      <!-- END Small Table -->
  </div>


<!-- From Right Block Modal -->
<div class="modal fade" id="modal-block-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tambah Project</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                  <form action="{{ url('project')}} " method="post">
                    {{csrf_field()}}
                    <label for="nama" class="text-black" style="font-size:13px;">Nama Project</label>
                    <input type="text" class="form-control form-control-sm mb-3 {{ $errors->has('name') ? 'is-invalid' : '' }}" name="nama" placeholder="Isikan Nama Project" autofocus>
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
    										{{ $errors->first('name') }}
    									</div>
                    @endif
                </div>
                </div>
                <div class="block-content block-content-full text-right border-top pb-2 pt-2">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Save</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END From Right Block Modal -->

<!-- Update -->
@foreach($project as $p)
<div class="modal fade" id="update{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-fromright" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromright" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Update Project {{$p->id}}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                  <form action="{{ url('project/update')}} " method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$p->id}}">
                    <?php date_default_timezone_set('Asia/Jakarta') ?>
                    <label for="nama" class="text-danger" style="font-size:13px;">*Project ini dibuat pada {{date ('d F Y H:i',$p->created_at)}}</label>
                    <input type="text" class="form-control form-control-sm" name="nama" value="{{$p->nama}}" required>
                    <br>
                </div>
                </div>
                <div class="block-content block-content-full text-right border-top pb-2 pt-2">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check mr-1"></i>Save</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Update -->
@endforeach

@include('sweet::alert')
@endsection
