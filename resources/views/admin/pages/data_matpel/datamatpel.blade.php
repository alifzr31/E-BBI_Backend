@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row-center-spacebetween">
                        <p class="card-title mb-0">Data Mata Pelajaran</p>
                        <a href="{{ route('admin-tambahmatpel') }}" class="btn btn-primary btn-icon-text px-3 py-3">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah Pelajaran
                        </a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th>Nama Pelajaran</th>
                                    <th>Semester</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matpels as $matpel)
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">{{ $matpel->nama_matpel }}</td>
                                        <td class="text-capitalize">{{ $matpel->semester }}</td>
                                        <td>
                                            <a onclick="show({{ $matpel->id }})"
                                                class="btn btn-info btn-icon-text px-3 py-3">
                                                <i class="ti-eye btn-icon-prepend"></i>
                                                Detail
                                            </a>
                                            <a href="{{ route('admin-editmatpel', $matpel->id) }}"
                                                class="btn btn-success btn-icon-text px-3 py-3">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                            <a onclick="hapus({{ $matpel->id }})"
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

@include('admin.pages.data_matpel.components.modaldetailmatpel')
@include('admin.pages.data_matpel.components.modalhapusmatpel')
@include('admin.components.foot')
