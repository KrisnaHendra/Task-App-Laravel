@extends('template')
@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Checkable Table (.js-table-checkable class is initialized in Helpers.tableToolsCheckable()) -->
    <div class="block">
        <div class="block-header bg-info">
            <h3 class="block-title text-white">Task Pending Masuk</h3>
            <div class="block-options">
                <div class="block-options-item text-white">
                  <b><i class="fa fa-calendar"></i> {{date('d F Y')}}</b>
                </div>
            </div>
        </div>
        <div class="block-content">
            <!-- If you put a checkbox in thead section, it will automatically toggle all tbody section checkboxes -->
            <table class="js-table-checkable table table-hover table-vcenter">
                <thead>
                    <tr class="bg-light">
                        <th class="text-center" style="width: 70px;">
                            <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox" class="custom-control-input" id="check-all" name="check-all">
                                <label class="custom-control-label" for="check-all"></label>

                            </div>
                        </th>
                        <th>Name / project / task</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Tipe</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox" class="custom-control-input" id="row_1" name="row_1">
                                <label class="custom-control-label" for="row_1"></label>
                            </div>
                        </td>
                        <td class="font-size-sm">
                            <p class="font-w600 mb-1">
                                <a href="be_pages_generic_profile.html">Sara Fields</a>
                            </p>
                            <p class="text-muted mb-0">
                                Customer details and further information
                            </p>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-danger">Disabled</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <em class="font-size-sm text-muted">November 17, 2018 08:35</em>
                        </td>
                    </tr> -->
                    @foreach($listTask as $k => $v)
                    @foreach($v['detail'] as $key => $value)
                    <tr>
                        <td class="text-center">
                            <!-- <div class="custom-control custom-checkbox custom-control-primary d-inline-block"> -->
                                <a href="{{ url('updateTaskPending') }}/{{ $value['id'] }}" class="btn btn-sm p-0 pl-1 pr-1 btn-dark" data-toggle="tooltip" title="Complete"><i class="fa fa-check"></i> </a>
                            <!-- </div> -->
                        </td>
                        <td class="font-size-sm">
                            <p class="font-w600 mb-1">
                                <a href="be_pages_generic_profile.html">{{ $value['user'] }}</a> <span class="text-dark"><i class="fa fa-angle-double-right"></i> ({{ $value['project'] }})</span>
                            </p>
                            <p class="text-muted mb-0">
                               <!-- {{ $value['project'] }} <br> -->
                                <i class="fa fa-clipboard-list"></i> {{ $value['isi'] }}
                            </p>
                        </td>
                        <td class="d-none d-sm-table-cell">
                          @if($value['tipe']=='Bug')
                          <span class="badge badge-danger">{{ $value['tipe'] }}</span>
                          @elseif($value['tipe']=='Revisi')
                          <span class="badge badge-warning">{{ $value['tipe'] }}</span>
                          @else
                          <span class="badge badge-info">{{ $value['tipe'] }}</span>
                          @endif
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <em class="font-size-sm text-muted">{{ date('F d, Y H:i',$value['created_at']) }}</em>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!-- END Checkable Table -->

</div>
<!-- END Page Content -->
@include('sweet::alert')
@endsection
