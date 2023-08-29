@include('admin.components.head')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-capitalize">Selamat Datang {{ Auth::user()->username }}
                    </h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have
                        <span class="text-primary">3 unread alerts!</span>
                    </h6>
                </div>
                {{-- <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="images/dashboard/people.svg" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>24<sup>C</sup>
                                </h2>
                            </div>
                            <div class="ml-2">
                                <h4 class="location font-weight-normal">Bandung</h4>
                                <h6 class="font-weight-normal">Indonesia</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Siswa</p>
                            <p class="fs-30 mb-2">{{ $total_siswa }} Siswa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Guru</p>
                            <p class="fs-30 mb-2">{{ $total_guru }} Guru</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Pengajar</p>
                            <p class="fs-30 mb-2">{{ $total_gurumatpel }} Pengajar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total Pembelajaran</p>
                            <p class="fs-30 mb-2">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Data User</p>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-capitalize">
                                            @if ($user->role == 'siswa')
                                                {{ $user->siswa->nama }}
                                            @else
                                                {{ $user->guru->nama }}
                                            @endif
                                        </td>
                                        <td class="font-weight-bold">{{ $user->username }}</td>
                                        <td class="text-capitalize">{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('admin-edituser', $user->id) }}"
                                                class="btn btn-success btn-icon-text px-3 py-3">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.components.foot')
