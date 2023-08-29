<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @if (Route::current()->getName() == 'admin-dashboard')
            E-Learning Admin || Dashboard
        @elseif (Route::current()->getName() == 'admin-edituser')
            E-Learning Admin || Edit User
        @elseif (Route::current()->getName() == 'admin-datasiswa')
            E-Learning Admin || Data Siswa
        @elseif (Route::current()->getName() == 'admin-tambahsiswa')
            E-Learning Admin || Tambah Siswa
        @elseif (Route::current()->getName() == 'admin-editsiswa')
            E-Learning Admin || Edit Siswa
        @elseif (Route::current()->getName() == 'admin-dataguru')
            E-Learning Admin || Data Guru
        @elseif (Route::current()->getName() == 'admin-tambahguru')
            E-Learning Admin || Tambah Guru
        @elseif (Route::current()->getName() == 'admin-editguru')
            E-Learning Admin || Edit Guru
        @elseif (Route::current()->getName() == 'admin-datamatpel')
            E-Learning Admin || Data Mata Pelajaran
        @elseif (Route::current()->getName() == 'admin-tambahmatpel')
            E-Learning Admin || Tambah Mata Pelajaran
        @elseif (Route::current()->getName() == 'admin-editmatpel')
            E-Learning Admin || Edit Mata Pelajaran
        @elseif (Route::current()->getName() == 'admin-datakelas')
            E-Learning Admin || Data Kelas
        @elseif (Route::current()->getName() == 'admin-tambahkelas')
            E-Learning Admin || Tambah Kelas
        @elseif (Route::current()->getName() == 'admin-editkelas')
            E-Learning Admin || Edit Kelas
        @elseif (Route::current()->getName() == 'admin-gurumatpel')
            E-Learning Admin || Data Pengajar
        @elseif (Route::current()->getName() == 'admin-tambahgurumatpel')
            E-Learning Admin || Tambah Pengajar
        @elseif (Route::current()->getName() == 'admin-editgurumatpel')
            E-Learning Admin || Edit Pengajar
        @elseif (Route::current()->getName() == 'admin-siswamatpel')
            E-Learning Admin || Data Pembelajaran
        @elseif (Route::current()->getName() == 'admin-tambahsiswamatpel')
            E-Learning Admin || Tambah Pembelajaran
        @else
            E-Learning Admin ||
        @endif
    </title>
    <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/mine.css') }}">
    <link rel="shortcut icon" href="{{ url('admin/images/logo.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ url('admin/images/logo.png') }}"
                        class="mr-2" alt="logo" width="100%"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{ url('admin/images/logo.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                {{-- <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul> --}}
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ url('admin/images/admin.svg') }}" alt="Foto Profil" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item text-capitalize">
                                <i class="ti-user text-primary"></i>
                                {{ Auth::user()->username }}
                            </a>
                            <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin-dashboard') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{-- @if (Route::current()->getName() != 'admin-dashboard') nav-active active @endif --}}">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Data Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse {{-- @if (Route::current()->getName() != 'admin-dashboard') show @endif --}}" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                {{-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Data
                                        User</a></li> --}}
                                <li class="nav-item" style="list-style: none;"> <a class="nav-link"
                                        href="{{ route('admin-datasiswa') }}">Data
                                        Siswa</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('admin-dataguru') }}">Data
                                        Guru</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('admin-datamatpel') }}">Data
                                        Pelajaran</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ route('admin-datakelas') }}">Data
                                        Kelas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item @if (Route::current()->getName() == 'admin-tambahgurumatpel' || Route::current()->getName() == 'admin-editgurumatpel') nav-active active @endif">
                        <a class="nav-link" href="{{ route('admin-gurumatpel') }}">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Data Pengajar</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item @if (Route::current()->getName() == 'admin-tambahsiswamatpel') nav-active active @endif">
                        <a class="nav-link" href="{{ route('admin-siswamatpel') }}">
                            <i class="icon-book menu-icon"></i>
                            <span class="menu-title">Data Pembelajaran</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <div class="main-panel">
