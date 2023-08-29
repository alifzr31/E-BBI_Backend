@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Pembelajaran</h4>
                    <p class="card-description">
                        Tambah Data Pembelajaran
                    </p>
                    <form action="{{ route('admin-storesiswamatpel') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleSelectGender">Siswa</label>
                            <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Siswa</option>
                                @foreach ($siswas as $siswa)
                                    <option class="text-capitalize" value="{{ $siswa->id }}"
                                        @if (old('siswa_id') == $siswa->id) selected @endif>{{ $siswa->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('siswa_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Pembelajaran</label>
                            <select name="guru_matpel_id"
                                class="form-control @error('guru_matpel_id') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Pembelajaran</option>
                                @foreach ($gurumatpel as $pembelajaran)
                                    <option class="text-capitalize" value="{{ $pembelajaran->id }}"
                                        @if (old('guru_matpel_id') == $pembelajaran->id) selected @endif>
                                        {{ $pembelajaran->matpel->nama_matpel }} (Semester
                                        {{ $pembelajaran->matpel->semester }}) - @if ($pembelajaran->guru->jk == 'laki-laki')
                                            Bpk.
                                        @else
                                            Ibu.
                                        @endif {{ $pembelajaran->guru->nama }} - Kelas
                                        {{ $pembelajaran->kelas->kls_angka . $pembelajaran->kelas->kls_huruf }}
                                    </option>
                                @endforeach
                            </select>

                            @error('guru_matpel_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" style="float: right;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.components.foot')
