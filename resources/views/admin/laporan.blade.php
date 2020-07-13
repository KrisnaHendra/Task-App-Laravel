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
      <div class="block block-bordered">
          <div class="block-header block-header-primary pb-2 pt-2">
              <h3 class="block-title">Laporan <small>Progress Task</small></h3>
          </div>
          <hr class="mb-0 mt-0">
          <div class="block-content font-size-sm">
            <form action="{{ url('laporan/cari') }}" method="GET">
              <div class="form-group row mb-0">
                <label for="periode" class="offset-sm-1 col-sm-1 col-form-label-sm">Periode<span class="text-danger">*</span></label>
                <div class="form-group col-sm-4">
                    <div class="input-group">
                        <div class="input-group-prepend-sm">
                            <span class="input-group-text">
                                <i class="far fa-calendar"></i>
                            </span>
                        </div>
                        <input type="text" class="datepicker form-control form-control-alt form-control-sm" name="periode" data-date-format="MM yyyy" placeholder="Pilih Bulan & Tahun">
                    </div>
                </div>
                <!--  -->
                <label for="project" class="col-sm-1 col-form-label-sm">Project<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                  <select class="selectpicker form-control form-control-sm" name="project" data-live-search="true" title="Pilih Project...">
                    @foreach($project as $p)
                    <option data-tokens="{{$p->id}}" value="{{$p->id}}" class="pt-0 pb-0" style="height:28px">{{$p->nama}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12 text-center">
                <button type="submit" name="button" class="btn btn-sm btn-primary font-size-sm mb-3 mt-2"><i class="fa fa-eye"></i> Tampilkan</button>
              </div>
            </form>
          </div>
      </div>
  </div>
  @if(count($data)>0)
  <!-- Data Laporan -->
  <div class="col-12">
      <div class="block">
          <div class="block-header">
              <h3 class="block-title">Laporan Bulan {{$bulan}} {{$tahun}}</h3>
              <div class="block-options">
                  <!--
                  To activate loading state to a block, just add the following properties to your button: data-toggle="block-option" data-action="state_toggle"
                  If you also add the property data-action-mode="demo" the loading state will be disabled in 2 seconds for demostration purposes

                  Without the demo mode, you can restore the block to its normal state by using the following JS code: One.block('state_normal', '#block-id');
                  You can use it after you've loaded successfully your data (please check Block API)
                  -->
                  <button type="button" class="btn btn-sm btn-info" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                  </button>
              </div>
          </div>
          <div class="block-content">
              <table class="table table-sm table-bordered table-hover font-size-sm">
                <tr class="bg-light">
                  <td>#</td>
                  <td>User</td>
                  <td>Project</td>
                  <td>Task</td>
                  <td>Tipe</td>
                  <td>Tgl Dibuat</td>
                  <td>Status</td>
                </tr>
                @foreach($data as $no => $d)
                <tr>
                  <td>{{ ++$no }}</td>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->nama }}</td>
                  <td>{{ $d->isi }}</td>
                  <td>{{ $d->tipe }}</td>
                  <td>{{ date('d/m/Y',$d->created_at) }}</td>
                  @if($d->dikerjakan==0)
                  <td class="text-center"><span data-toggle="tooltip" title="Uncomplete" class="badge badge-danger"><i class="fa fa-times-circle"></i></span></td>
                  @endif
                  @if($d->dikerjakan==1)
                  <td class="text-center"><span data-toggle="tooltip" title="Pending" class="badge badge-warning"><i class="fa fa-retweet"></i></span></td>
                  @endif
                  @if($d->dikerjakan==2)
                  <td class="text-center"><span data-toggle="tooltip" title="Selesai" class="badge badge-success"><i class="fa fa-check-circle"></i></span></td>
                  @endif
                </tr>
                @endforeach
              </table>
          </div>
      </div>
  </div>
  @endif

  <!-- End Data -->

</div>

<script type="text/javascript">
$(".datepicker").datepicker( {
  format: "MM yyyy",
  viewMode: "months",
  minViewMode: "months"
});

</script>

@endsection
