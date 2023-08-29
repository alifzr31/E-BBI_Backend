@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row-center-spacebetween">
                        <p class="card-title mb-0">Data Guru</p>
                        <a href="{{ route('admin-tambahguru') }}" class="btn btn-primary btn-icon-text px-3 py-3">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Tambah Guru
                        </a>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-hover" id="dataTableHover">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gurus as $guru)
                                    <tr>
                                        <td>{{ $guru->nip }}</td>
                                        <td class="font-weight-bold text-capitalize">{{ $guru->nama }}</td>
                                        <td class="text-capitalize">{{ $guru->jk }}</td>
                                        <td>
                                            <a onclick="show({{ $guru->id }})"
                                                class="btn btn-info btn-icon-text px-3 py-3">
                                                <i class="ti-eye btn-icon-prepend"></i>
                                                Detail
                                            </a>
                                            <a href="{{ route('admin-editguru', $guru->id) }}"
                                                class="btn btn-success btn-icon-text px-3 py-3">
                                                <i class="ti-pencil btn-icon-prepend"></i>
                                                Edit
                                            </a>
                                            <a onclick="hapus({{ $guru->id }})"
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

@include('admin.pages.data_guru.components.modaldetailguru')
@include('admin.pages.data_guru.components.modalhapusguru')
@include('admin.components.foot')
