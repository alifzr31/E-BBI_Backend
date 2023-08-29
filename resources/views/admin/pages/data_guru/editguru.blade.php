@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Guru</h4>
                    <p class="card-description">
                        Edit Data Guru
                    </p>
                    <form action="{{ route('admin-updateguru', $guru->id) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail3">No. Induk Pegawai</label>
                            <input type="number" name="nip" class="form-control @error('nip') is-invalid @enderror"
                                id="exampleInputEmail3" placeholder="No. Induk Siswa" value="{{ $guru->nip }}">

                            @error('nip')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Lengkap</label>
                            <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" id="exampleInputName1"
                                placeholder="Nama Lengkap" value="{{ $guru->nama }}">

                            @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat"
                                style="height: 150px; resize: none;">{{ $guru->alamat }}</textarea>

                            @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">No. Telepon</label>
                            <input type="tel" name="no_telp"
                                class="form-control @error('no_telp') is-invalid @enderror" id="exampleInputCity1"
                                placeholder="No. Telepon" value="{{ $guru->no_telp }}">

                            @error('no_telp')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Jenis Kelamin</label>
                            <select name="jk" class="form-control @error('jk') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Jenis Kelamin</option>
                                <option value="laki-laki" @if ($guru->jk == 'laki-laki') selected @endif>Laki-laki
                                </option>
                                <option value="perempuan" @if ($guru->jk == 'perempuan') selected @endif>Perempuan
                                </option>
                            </select>

                            @error('jk')
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
