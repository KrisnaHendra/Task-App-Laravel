@extends('template')
@section('content')
<!-- CSS Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- Javascript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<div class="content">

  <div class="col-12">
    <div class="block block-rounded block-bordered">
        <div class="block-header block-header-default bg-info">
            <h4 class="mb-0 font-weight-bold text-white">Daily Activity</h4>
        </div>
        <div class="block-content">
            <div class="row">
              <div class="col-md-3">
                  <a class="block block-rounded block-link-rotate" href="javascript:void(0)">
                      <div class="block-content bg-info">
                        <div class="row">
                          <div class="col-4">
                              <i class="fa fa-tasks text-white mb-3" style="font-size:60px;"></i>
                          </div>
                          <div class="col-8">
                              <h2 class="mb-0 text-white">
                                @foreach($allTask as $a)
                                  {{ $a->total }}
                                @endforeach
                              </h2>
                              <p class="mb-0 font-weight-bold text-white" style="font-size:15px">Total Task</p>
                          </div>
                        </div>
                      </div>
                  </a>
              </div>
              <!--  -->
              <div class="col-md-3">
                  <a class="block block-rounded block-link-rotate" href="javascript:void(0)">
                      <div class="block-content bg-danger">
                        <div class="row">
                          <div class="col-4">
                              <i class="fa fa-exclamation-triangle text-white mb-3" style="font-size:60px;"></i>
                          </div>
                          <div class="col-8">
                              <h2 class="mb-0 text-white">
                                @foreach($uncomplete as $u)
                                  {{ $u->uncomplete }}
                                @endforeach
                              </h2>
                              <p class="mb-0 font-weight-bold text-white" style="font-size:15px">Uncomplete</p>
                          </div>
                        </div>
                      </div>
                  </a>
              </div>
              <!--  -->
              <div class="col-md-3">
                  <a class="block block-rounded block-link-rotate" href="{{ url('task/pending') }}">
                      <div class="block-content bg-warning">
                        <div class="row">
                          <div class="col-4">
                              <i class="fa fa-clock text-white mb-3" style="font-size:60px;"></i>
                          </div>
                          <div class="col-8">
                              <h2 class="mb-0 text-white">
                                @foreach($pending as $p)
                                  {{ $p->pending }}
                                @endforeach
                              </h2>
                              <p class="mb-0 font-weight-bold text-white" style="font-size:15px">Pending Review</p>
                          </div>
                        </div>
                      </div>
                  </a>
              </div>
              <!--  -->
              <div class="col-md-3">
                  <a class="block block-rounded block-link-rotate" href="{{ url('task/complete') }}">
                      <div class="block-content bg-success">
                        <div class="row">
                          <div class="col-4">
                              <i class="fa fa-check-circle text-white mb-3" style="font-size:60px;"></i>
                          </div>
                          <div class="col-8">
                              <h2 class="mb-0 text-white">
                                @foreach($done as $d)
                                  {{ $d->done }}
                                @endforeach
                              </h2>
                              <p class="mb-0 font-weight-bold text-white" style="font-size:15px">Complete</p>
                          </div>
                        </div>
                      </div>
                  </a>
              </div>
              <!--  -->
            </div>
            <!-- ROW 2 -->
            <div class="row">

              <div class="col-2">
                <a href="#" class="btn btn-block btn-info" style="font-size:12px" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus-circle"></i> Tambah Task Baru</a>
              </div>
              <div class="col-3">
                    <div class="input-group" style="width:170px">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-user"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control form-control-sm" value="{{Auth::user()->name}}" readonly>
                    </div>
              </div>
              <div class="col-7 text-right">
                <a href="#" class="btn btn-sm btn-info">Semua Task <i class="fa fa-check"></i></a>
                <a href="#" class="btn btn-sm btn-info">Bug</a>
                <a href="#" class="btn btn-sm btn-info">Revisi</a>
                <a href="#" class="btn btn-sm btn-info">Baru</a>
              </div>
              </div>
              <!-- END ROW 2 -->
              <!-- ROW 3 -->
              <div class="row">
                @if(count($listTask) > 0)
                <div class="col-12 mt-2">
                                <div id="faq1" class="mb-5" role="tablist" aria-multiselectable="true">
                                  <!-- List Task -->
                                    @foreach($listTask as $key => $value)
                                    <div class="block block-bordered mb-1">
                                        <div class="block-header block-header-default bg-primary mb-0" role="tab" id="faq1_h2" style="height:30px">
                                            <a class="text-muted collapsed text-white col-12 font-weight-bold mb-0" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2" aria-expanded="true" aria-controls="faq1_q2">
                                              <i class="fa fa-angle-double-down"></i> {{$key}} ({{ $jumlah[$key] }} Task)
                                            </a>
                                        </div>
                                        <div id="faq1_q2" class="collapse show" role="tabpanel" aria-labelledby="faq1_h2" data-parent="#faq1">
                                            <div class="block-content mt-0 pt-1">
                                                <table class="mt-0 table-sm font-sm col-12" style="font-size:13px;">
                                                  @foreach($value['detail'] as $key2 => $value2)
                                                  <tr style="border-bottom:1px solid #c9c9c9;">
                                                    <td class="pb-2 text-left" style="width:25px; height:100%; vertical-align: center;">
                                                      <!-- <input class="form-check-input mt-0 ml-0 mb-0 mr-0" type="checkbox" value="" name="checkbox"> -->
                                                      <form action="{{ url('task/updatePending') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_task" value="{{ $value2['id'] }}">
                                                        <button type="submit" class="btn btn-sm btn-outline-primary p-0 m-0 pr-1 pl-1" name="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending"><i class="fa fa-check"></i></button>
                                                      </form>
                                                    </td>
                                                    <td>
                                                        <b>{{ $value2['project'] }}</b> <i class="fa fa-angle-right text-primary"></i>
                                                        {{ $value2['isi'] }}
                                                        <br>
                                                        @if($value2['tipe']=='Bug')
                                                        <span class="badge badge-danger">{{ $value2['tipe'] }}</span>
                                                        @endif
                                                        @if($value2['tipe']=='Revisi')
                                                        <span class="badge badge-warning">{{ $value2['tipe'] }}</span>
                                                        @endif
                                                        @if($value2['tipe']=='Fitur')
                                                        <span class="badge badge-info">{{ $value2['tipe'] }}</span>
                                                        @endif
                                                        <i class="fa fa-calendar"></i> {{ date('d/m/Y',$value2['created_at']) }}
                                                        <i class="fa fa-user"></i> By : {{ $value2['created_by'] }}
                                                    </td>
                                                    <td class="text-right">
                                                      <span class="badge badge-light"><i class="fa fa-calendar-times"></i> {{ $value2['tgl_deadline'] }}</span>
                                                      @if(Auth::user()->role_id==1)
                                                      <a href="/task/hapus/{{$value2['id']}}" class="badge badge-danger font-size-sm" data-toggle="tooltip" title="Hapus" onclick="return confirm('Anda yakin?')"><i class="fa fa-times-circle"></i></a>
                                                      @endif
                                                    </td>
                                                  </tr>
                                                  @endforeach

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <!-- END Introduction -->
                            </div>
                            @endif
                @if(count($listTask)==0)
                <div class="col-12 mt-2">
                  <div class="alert alert-primary text-center">
                    Belum Ada Task
                  </div>
                </div>
                @endif
              </div>
              <!-- END ROW 3 -->
            </div>


        </div>
    </div>
  </div>

</div>

<!-- Tambah Task Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white" id="staticBackdropLabel">Tambah Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-6">
              <i class="btn btn-sm btn-block btn-info mb-0 mt-0 pb-0 pt-0"><i class="fa fa-calendar"></i> Tanggal Assigne</i>
              <input type="text" class="datepicker form-control text-center" name="tgl_assigne" data-date-format="yyyy-mm-dd" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-6">
              <i class="btn btn-sm btn-block btn-info mb-0 mt-0 pb-0 pt-0"><i class="fa fa-calendar"></i> Tanggal Deadline</i>
              <input type="text" class="datepicker form-control text-center" name="tgl_deadline" data-date-format="yyyy-mm-dd" value="{{ date('Y-m-d') }}">
            </div>
          </div>
          <i class="btn btn-sm btn-block btn-info mb-0 mt-2 pb-0 pt-0"><i class="fa fa-user"></i> Pilih User</i>
          <select class="selectpicker form-control form-control-sm" name="id_user" data-live-search="true" title="Pilih User...">
            @foreach($user as $u)
            <option data-tokens="{{$u->id}}" value="{{$u->id}}" class="pt-0 pb-0" style="height:28px">{{$u->name}}</option>
            @endforeach
          </select>

          <i class="btn btn-sm btn-block btn-info mb-0 mt-2 pb-0 pt-0"><i class="fa fa-calendar"></i> Pilih Project</i>
          <select class="selectpicker form-control form-control-sm" name="project" data-live-search="true" title="Pilih Project...">
            @foreach($project as $p)
            <option data-tokens="{{$p->id}}" value="{{$p->id}}" class="pt-0 pb-0" style="height:28px">{{$p->nama}}</option>
            @endforeach
          </select>
          <textarea class="js-maxlength form-control mt-2" name="task" rows="3" maxlength="100" placeholder="Tambahkan task baru ..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" data-placement="bottom" required></textarea>
          <!-- <div class="btn-group btn-group-toggle mt-2" data-toggle="buttons">
            <label class="btn btn-sm btn-danger active">
              <input type="radio" name="" checked> Bug
            </label>
            <label class="btn btn-sm btn-warning">
              <input type="radio" name=""> Revisi
            </label>
            <label class="btn btn-sm btn-success">
              <input type="radio" name=""> Fitur
            </label>
          </div> -->
          <div class="form-group mt-2">
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-inline1" value="Bug" name="tipe" checked="">
                  <label class="custom-control-label btn btn-sm btn-danger" for="example-rd-custom-inline1">Bug</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-inline2" value="Revisi" name="tipe">
                  <label class="custom-control-label btn btn-sm btn-warning" for="example-rd-custom-inline2">Revisi</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input" id="example-rd-custom-inline3" value="Fitur" name="tipe">
                  <label class="custom-control-label btn btn-sm btn-success" for="example-rd-custom-inline3">Fitur</label>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-info">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- End Tambah Task -->

<script type="text/javascript">
  $('.datepicker').datepicker();
 </script>
@include('sweet::alert')
@endsection
