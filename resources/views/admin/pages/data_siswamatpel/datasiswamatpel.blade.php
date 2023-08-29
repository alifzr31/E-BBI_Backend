@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row-center-spacebetween">
                        <p class="card-title mb-0">Data Pembelajaran</p>
                        <a href="{{ route('admin-tambahsiswamatpel') }}" class="btn btn-primary btn-icon-text px-3 py-3">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah Pembelajaran
                        </a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th>Siswa</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswamatpel as $pembelajaran)
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">
                                            {{ $pembelajaran->siswa->nama }}</td>
                                        <td class="text-capitalize">
                                            {{ $pembelajaran->gurumatpel->kelas->kls_angka . $pembelajaran->gurumatpel->kelas->kls_huruf }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $pembelajaran->gurumatpel->matpel->nama_matpel }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-icon-text px-3 py-3">
                                                <i class="ti-eye btn-icon-prepend"></i>
                                                Detail
                                            </a>
                                            <a href="{{ route('admin-editgurumatpel', $pembelajaran->id) }}"
                                                class="btn btn-success btn-icon-text px-3 py-3">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                            <a onclick="hapus({{ $pembelajaran->id }})"
                                                class="btn btn-danger btn-icon-text px-3 py-3">
                                                <i class="ti-trash btn-icon-prepend"></i>
                                                Hapus
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
