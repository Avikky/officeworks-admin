
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Officeworks - {{ Auth::user()->name }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css')}}">

</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar  navbar-laravel navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav ml-auto" style="margin-right: 2rem;">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-bell fa-2x"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/img/user-img.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                               Dashboard
                            </p>
                        </router-link>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <router-link to="/profile" class="nav-link">--}}
{{--                            <i class="nav-icon text-warning fas fa-user"></i>--}}
{{--                            <p>--}}
{{--                               Profile--}}
{{--                            </p>--}}
{{--                        </router-link>--}}
{{--                    </li>--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sitemap"></i>
                            <p>
                                Departments
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/department" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Department</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/department-sections" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Department Sections</p>
                                </router-link>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <router-link to="/view-department" class="nav-link">--}}
{{--                                    <i class="fas fa-sitemap nav-icon"></i>--}}
{{--                                    <p>View Department</p>--}}
{{--                                </router-link>--}}
{{--                            </li>--}}
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Manage Staff
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/staff-position" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Position/Rank</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/all-staff" class="nav-link">
                                    <i class="fas fa-users  nav-icon"></i>
                                    <p>All Staff</p>
                                </router-link>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Projects
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/projects" class="nav-link">
                                    <i class="fas fa-user-lock nav-icon"></i>
                                    <p>Projects</p>
                                </router-link>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <router-link to="/" class="nav-link">--}}
{{--                                    <i class="fas fa-cog nav-icon"></i>--}}
{{--                                    <p>View Projects</p>--}}
{{--                                </router-link>--}}
{{--                            </li>--}}
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>
                                Manage finance
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/expenditure" class="nav-link">
                                    <i class="fas fa-chart-bar nav-icon"></i>
                                    <p>Expenditures</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/income" class="nav-link">
                                    <i class="fas fa-money-check-alt nav-icon"></i>
                                    <p>Income</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/account-statement" class="nav-link">
                                    <i class="fas fa-chart-pie nav-icon"></i>
                                    <p>Accounts Statements</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Reports
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/monthly-report" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Monthly report</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/daily-report" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Daily Reports</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/project-report" class="nav-link">
                                    <i class="fas fa-file-powerpoint nav-icon"></i>
                                    <p>Projects Reports</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-registered"></i>
                            <p>
                                Requests
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/leave-request" class="nav-link">
                                    <i class="fas fa-dot-circle nav-icon"></i>
                                    <p>Leave Request</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/other-request" class="nav-link">
                                    <i class="fas fa-dot-circle nav-icon"></i>
                                    <p>Other Requests</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Manage Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/admin-role" class="nav-link">
                                    <i class="fas fa-user-tag nav-icon"></i>
                                    <p>Create Role</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/admin" class="nav-link">
                                    <i class="fas fa-user-friends nav-icon"></i>
                                    <p>All Admin</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <router-link to="/announcement" class="nav-link">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>
                                Annoucements
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item red">
                        <router-link to="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon text-danger fas fa-power-off"></i>
                            <p>
                                {{ __('Logout') }}
                            </p>
                        </router-link>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"  style="display: none;">
                                @csrf
                            </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <router-view></router-view>
                <!-- set progressbar -->
                <vue-progress-bar></vue-progress-bar>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
           SpecsTechAfrica
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('Y') }} </strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<script src="{{ asset('/js/app.js')}}"></script>
{{--<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>--}}
{{--<script>--}}
{{--    // Replace the <textarea id="editor1"> with a CKEditor--}}
{{--    // instance, using default configuration.--}}
{{--    CKEDITOR.replaceClass( 'ckeditor' );--}}
{{--</script>--}}
</body>
</html>
