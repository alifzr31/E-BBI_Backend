@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row-center-spacebetween">
                        <p class="card-title mb-0">Data Kelas</p>
                        <a href="{{ route('admin-tambahkelas') }}" class="btn btn-primary btn-icon-text px-3 py-3">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah Kelas
                        </a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th>Kelas Angka</th>
                                    <th>Kelas Huruf</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $kls)
                                    <tr>
                                        <td class="font-weight-bold text-capitalize">{{ $kls->kls_angka }}</td>
                                        <td class="text-capitalize">{{ $kls->kls_huruf }}</td>
                                        <td>
                                            <a onclick="show({{ $kls->id }}, {{ $kls->kls_angka }}, '{{ $kls->kls_huruf }}')"
                                                class="btn btn-info btn-icon-text px-3 py-3">
                                                <i class="ti-eye btn-icon-prepend"></i>
                                                Detail
                                            </a>
                                            <a href="{{ route('admin-editkelas', $kls->id) }}"
                                                class="btn btn-success btn-icon-text px-3 py-3">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                            <a onclick="hapus({{ $kls->id }})"
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

@include('admin.pages.data_kelas.components.modaldetailkelas')
@include('admin.pages.data_kelas.components.modalhapuskelas')
@include('admin.components.foot')
