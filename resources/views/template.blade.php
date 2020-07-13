<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Task Synchronize</title>

        <meta name="description" content="Task Synchronize">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Task Synchronize">
        <meta property="og:site_name" content="Task Synchronize">
        <meta property="og:description" content="Task Synchronize">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/login/') }}/img/task.png">
        <link rel="icon" type="image/png" sizes="192x192" href="{{ URL::asset('assets/login/') }}/img/task.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('assets/login/') }}/img/task.png">
        <!-- END Icons -->

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/js/plugins/dropzone/dist/min/dropzone.min.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/') }}/assets/style.css">

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="{{ URL::asset('assets/admin/') }}/assets/css/oneui.min.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    </head>
    <body>

        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="{{ URL::asset('assets/admin/') }}/assets/media/avatars/avatar10.jpg" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- <a class="ml-auto btn btn-sm btn-dual" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times text-danger"></i>
                    </a> -->
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="">
                        <i class="fa fa-circle-notch text-primary"></i>
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5">Task</span> <span class="font-w400">Synchronize</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="{{ url('home') }}">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="{{ url('karyawan') }}">
                                <i class="nav-main-link-icon si si-user"></i>
                                <span class="nav-main-link-name">User</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Task</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="{{ url('project') }}">
                                <i class="nav-main-link-icon fa fa-archive"></i>
                                <span class="nav-main-link-name">Project</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="{{ url('task') }}">
                                <i class="nav-main-link-icon fa fa-tasks"></i>
                                <span class="nav-main-link-name">Daily Activity</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" aria-haspopup="true" aria-expanded="false" href="{{ url('laporan') }}">
                                <i class="nav-main-link-icon fa fa-chart-bar"></i>
                                <span class="nav-main-link-name">Laporan Progress</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Kerja Sama</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-energy"></i>
                                <span class="nav-main-link-name">Surat Kontrak</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ url('home') }}">
                                        <span class="nav-main-link-name">Styles</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="be_blocks_options.html">
                                        <span class="nav-main-link-name">Options</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="be_blocks_forms.html">
                                        <span class="nav-main-link-name">Forms</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="be_blocks_themed.html">
                                        <span class="nav-main-link-name">Themed</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="be_blocks_api.html">
                                        <span class="nav-main-link-name">API</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header bg-primary">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Toggle Mini Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <!-- END Toggle Mini Sidebar -->

                        <!-- Apps Modal -->
                        <!-- Opens the Apps modal found at the bottom of the page, after footer’s markup -->
                        <!-- <button type="button" class="btn btn-sm btn-dual mr-2" data-toggle="modal" data-target="#one-modal-apps">
                            <i class="si si-grid"></i>
                        </button> -->
                        <!-- END Apps Modal -->

                        <!-- Open Search Section (visible on smaller screens) -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout" data-action="header_search_on">
                            <i class="si si-magnifier"></i>
                        </button> -->
                        <!-- END Open Search Section -->

                        <!-- Search Form (visible on larger screens) -->
                            <div class="input-group input-group-sm" style="width:140px">
                                <a href="#" class="bg-light text-black font-weight-bold form-control form-control-alt text-center">{{ date('d M Y') }}</a>

                            </div>
                              <div class="input-group input-group-sm ml-2" style="width:110px">
                                <a href="#" class="bg-light text-black font-weight-bold form-control form-control-alt text-center">
                                  <i class="fa fa-clock"></i>
                                  <span id="jam"></span>
                                  <span id="menit"></span>
                                  <span id="detik"></span>
                                </a>
                              </div>
                        <!-- END Search Form -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="{{ URL::asset('assets/admin/') }}/assets/media/avatars/avatar10.jpg" alt="Header Avatar" style="width: 18px;">
                                <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ URL::asset('assets/admin/') }}/assets/media/avatars/avatar10.jpg" alt="">
                                </div>
                                <div class="p-2">
                                    <h5 class="dropdown-header text-uppercase">User Options</h5>
                                    <!-- <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                        <span>Inbox</span>
                                        <span>
                                            <span class="badge badge-pill badge-primary">3</span>
                                            <i class="si si-envelope-open ml-1"></i>
                                        </span>
                                    </a> -->
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('profile') }}">
                                        <span>Profile</span>
                                        <span>
                                            <span class="badge badge-pill badge-success">Cek</span>
                                            <i class="si si-user ml-1"></i>
                                        </span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('logout') }}">
                                        <span>Log Out</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>

                                    <!-- <div role="separator" class="dropdown-divider"></div>
                                    <h5 class="dropdown-header text-uppercase">Actions</h5>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                                        <span>Lock Account</span>
                                        <i class="si si-lock ml-1"></i>
                                    </a> -->

                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->


                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- <button type="button" class="btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
                        </button> -->
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-white">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                @yield('content')

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <!-- <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">OneUI 4.0</a> &copy; <span data-toggle="year-copy">2018</span>
                        </div>
                    </div>
                </div>
            </footer> -->
            <!-- END Footer -->

            <!-- Apps Modal -->
            <!-- Opens from the modal toggle button in the header -->
            <div class="modal fade" id="one-modal-apps" tabindex="-1" role="dialog" aria-labelledby="one-modal-apps" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-sm" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Apps</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row gutters-tiny">
                                    <div class="col-6">
                                        <!-- CRM -->
                                        <a class="block block-rounded block-themed bg-default" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-speedometer fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    CRM
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END CRM -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Products -->
                                        <a class="block block-rounded block-themed bg-danger" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-rocket fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Products
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Products -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Sales -->
                                        <a class="block block-rounded block-themed bg-success mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-plane fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Sales
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Sales -->
                                    </div>
                                    <div class="col-6">
                                        <!-- Payments -->
                                        <a class="block block-rounded block-themed bg-warning mb-0" href="javascript:void(0)">
                                            <div class="block-content text-center">
                                                <i class="si si-wallet fa-2x text-white-75"></i>
                                                <p class="font-w600 font-size-sm text-white mt-2 mb-3">
                                                    Payments
                                                </p>
                                            </div>
                                        </a>
                                        <!-- END Payments -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Apps Modal -->
        </div>
        <!-- END Page Container -->

        
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/oneui.core.min.js"></script>

        <script src="{{ URL::asset('assets/admin/') }}/assets/js/oneui.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/chart.js/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/pages/be_pages_dashboard.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/pages/be_tables_datatables.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="{{ URL::asset('assets/admin/') }}/assets/js/plugins/dropzone/dropzone.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <script>
        	window.setTimeout("waktu()", 1000);

        	function waktu() {
        		var waktu = new Date();
        		setTimeout("waktu()", 1000);
            var jam = waktu.getHours() + "";
            var menit = waktu.getMinutes() + "";
            var detik = waktu.getSeconds() + "";

        		document.getElementById("jam").innerHTML = (jam.length==1?"0"+jam:jam)+" :";
        		document.getElementById("menit").innerHTML = (menit.length==1?"0"+menit:menit)+" :";
        		document.getElementById("detik").innerHTML = detik.length==1?"0"+detik:detik;
        	}
        </script>

    </body>
</html>
