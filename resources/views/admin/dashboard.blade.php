@extends('template')
@section('content')
<!-- Page Content -->
<div class="content content-narrow">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-4 col-lg-6 col-xl-4">
            <a class="block block-rounded block-link-pop border-left border-light border-4x" href="{{url('task')}}">
                <div class="block-content block-content-full bg-danger pb-4 pt-4" style="background-color: #ff4224 !important;">
                  <div class="row">
                    <div class="col-4">
                        <i class="fa fa-exclamation-circle text-white mb-0" style="font-size:70px;"></i>
                    </div>
                    <div class="col-8">
                        <h1 class="mb-0 text-white">
                          @foreach($uncomplete as $u)
                          {{ $u->uncomplete }}
                          @endforeach
                        </h1>
                        <p class="mb-0 font-weight-bold text-white" style="font-size:16px">Uncomplete Task</p>
                    </div>
                  </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-6 col-xl-4">
            <a class="block block-rounded block-link-pop border-left border-light border-4x" href="{{url('task/pending')}}">
                <div class="block-content block-content-full bg-danger pb-4 pt-4" style="background-color: #ffd324 !important;">
                  <div class="row">
                    <div class="col-4">
                        <i class="fa fa-signal text-white mb-0" style="font-size:70px;"></i>
                    </div>
                    <div class="col-8">
                        <h1 class="mb-0 text-white">
                          @foreach($pending as $p)
                          {{ $p->pending }}
                          @endforeach
                        </h1>
                        <p class="mb-0 font-weight-bold text-white" style="font-size:16px">Pending Review</p>
                    </div>
                  </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-6 col-xl-4">
            <a class="block block-rounded block-link-pop border-left border-light border-4x" href="{{url('task/complete')}}">
                <div class="block-content block-content-full bg-danger pb-4 pt-4" style="background-color: #66ff24 !important;">
                  <div class="row">
                    <div class="col-4">
                        <i class="fa fa-check-circle text-white mb-0" style="font-size:70px;"></i>
                    </div>
                    <div class="col-8">
                        <h1 class="mb-0 text-white">
                          @foreach($done as $d)
                          {{ $d->done }}
                          @endforeach
                        </h1>
                        <p class="mb-0 font-weight-bold text-white" style="font-size:16px">Complete Task</p>
                    </div>
                  </div>
                </div>
            </a>
        </div>

    </div>
    <!-- END Stats -->

    <!-- Customers and Latest Orders -->
    <div class="row">
        <!-- Latest Customers -->
        <div class="col-lg-8 mb-0">
            <div class="block block-mode-loading-oneui block-bordered">
                <div class="block-header border-bottom bg-light">
                    <h3 class="block-title"><i class="fa fa-user-friends"></i> Team Performance</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <!-- <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button> -->
                    </div>
                </div>
                <div class="block-content block-content-full">
                  <!-- Data Task -->
                  <div class="row">
                    <?php $no=1; ?>
                    @foreach($task as $key => $value)
                    <div class="col-md-6 mb-3">
                      <div class="row">
                      <div class="col-md-2 bg-info text-center">
                          <h3 class="mt-2 mb-2 text-white">{{ $no++ }}</h3>
                      </div>

                      <div class="col-md-10 hovertask" onclick="location.href = '{{ url('task') }}' ">
                        <div class="row">
                          <div class="col-md-7 font-weight-bold" style="font-size:15px">
                            {{ $key }}
                          </div>
                          <div class="col-md-5 text-right" style="font-size:15px">
                            <span class="badge badge-info">Task : {{$tes[$key]}}/{{ $value['total'] }}</span>
                          </div>
                        </div>
                          @if($value['total']!=0)
                          <div class="progress push mb-2 mt-1" style="height:15px; margin:0;">
                              @if($tes[$key]/$value['total']*100 <= 50)
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ ($tes[$key]/$value['total'])*100 }}%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                              <span class="font-size-sm font-w600">{{ round((($tes[$key]/$value['total'])*100),2) }}%</span>
                              </div>
                              @endif
                              @if($tes[$key]/$value['total']*100 > 50)
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: {{ ($tes[$key]/$value['total'])*100 }}%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                              <span class="font-size-sm font-w600">{{ round((($tes[$key]/$value['total'])*100),2) }}%</span>
                              </div>
                              @endif
                          </div>
                          @endif
                          @if($value['total']==0)
                            <div class="progress push mb-2 mt-1" style="height:15px; margin:0;">
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                              <span class="font-size-sm">Belum Ada Task</span>
                              </div>
                            </div>
                          @endif
                      </div>

                      </div>
                    </div>
                    @endforeach

                  </div>
                  <!-- End Data Task -->
                </div>
            </div>
        </div>
        <!-- Project -->
        <div class="col-lg-4">
          <div class="block block-mode-loading-oneui block-bordered">
          <div class="block-header border-bottom bg-light">
              <h3 class="block-title"><i class="fa fa-clipboard-list"></i> Our Project</h3>
          </div>
          <div class="block-content block-content-full">
            <!-- Data -->
            <h6 class="mb-0">Cashier Loading Resto</h6>
            <div class="progress push mb-2 mt-1" style="height:17px; margin:0;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 90%; border-radius: 100px;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                    <span class="font-size-sm font-w600">90%</span>
                  </div>
            </div>

            <h6 class="mb-0">Company Profile PT Arion</h6>
            <div class="progress push mb-2 mt-1" style="height:17px; margin:0;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 75%; border-radius: 100px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <span class="font-size-sm font-w600">75%</span>
                  </div>
            </div>

            <h6 class="mb-0">App HRD Loading Resto</h6>
            <div class="progress push mb-2 mt-1" style="height:17px; margin:0;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 86%; border-radius: 100px;" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">
                    <span class="font-size-sm font-w600">86%</span>
                  </div>
            </div>

            <h6 class="mb-0">Maintenance Web SMK YP</h6>
            <div class="progress push mb-2 mt-1" style="height:17px; margin:0;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 40%; border-radius: 100px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                    <span class="font-size-sm font-w600">40%</span>
                  </div>
            </div>

            <!-- End Data -->
          </div>
        </div>
        <!-- End Project -->
        <!-- END Latest Customers -->

    </div>
    <!-- END Customers and Latest Orders -->
</div>
<!-- END Page Content -->
@include('sweet::alert')
@endsection
