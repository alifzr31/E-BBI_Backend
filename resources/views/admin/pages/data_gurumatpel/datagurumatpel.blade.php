@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row-center-spacebetween">
                        <p class="card-title mb-0">Data Pengajar</p>
                        <a href="{{ route('admin-tambahgurumatpel') }}" class="btn btn-primary btn-icon-text px-3 py-3">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah Pengajar
                        </a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Semester</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gurumatpel as $pengajar)
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">
                                            {{ $pengajar->matpel->nama_matpel }}</td>
                                        <td class="text-capitalize">{{ $pengajar->matpel->semester }}</td>
                                        <td class="text-capitalize">
                                            {{ $pengajar->kelas->kls_angka . $pengajar->kelas->kls_huruf }}</td>
                                        <td class="text-capitalize">{{ $pengajar->guru->nama }}</td>
                                        <td>
                                            <a href="{{ route('admin-editgurumatpel', $pengajar->id) }}"
                                                class="btn btn-success btn-icon-text px-3 py-3">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                            <a onclick="hapus({{ $pengajar->id }})"
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

@include('admin.pages.data_gurumatpel.components.modalhapusgurumatpel')
@include('admin.components.foot')
