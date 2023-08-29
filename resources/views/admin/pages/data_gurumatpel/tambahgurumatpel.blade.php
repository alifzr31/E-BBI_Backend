@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Pengajar</h4>
                    <p class="card-description">
                        Tambah Data Pengajar
                    </p>
                    <form action="{{ route('admin-storegurumatpel') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleSelectGender">Mata Pelajaran</label>
                            <select name="matpel_id" class="form-control @error('matpel_id') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Mata Pelajaran</option>
                                @foreach ($matpels as $matpel)
                                    <option class="text-capitalize" value="{{ $matpel->id }}"
                                        @if (old('matpel_id') == $matpel->id) selected @endif>{{ $matpel->nama_matpel }}
                                        (Semester {{ $matpel->semester }})
                                    </option>
                                @endforeach
                            </select>

                            @error('matpel_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Kelas</label>
                            <select name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Kelas</option>
                                @foreach ($kelas as $kls)
                                    <option value="{{ $kls->id }}"
                                        @if (old('kelas_id') == $kls->id) selected @endif>
                                        {{ $kls->kls_angka . $kls->kls_huruf }}
                                    </option>
                                @endforeach
                            </select>

                            @error('kelas_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Guru</label>
                            <select name="guru_id"
                                class="form-control text-capitalize @error('guru_id') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Guru</option>
                                @foreach ($gurus as $guru)
                                    <option class="text-capitalize" value="{{ $guru->id }}"
                                        @if (old('guru_id') == $guru->id) selected @endif>{{ $guru->nama }}
                                    </option>
                                @endforeach
                            </select>

                            @error('guru_id')
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
