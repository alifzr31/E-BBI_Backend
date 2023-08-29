@include('admin.components.head')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Siswa</h4>
                    <p class="card-description">
                        Tambah Data Siswa
                    </p>
                    <form action="{{ route('admin-storesiswa') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">No. Induk Siswa</label>
                                    <input type="number" name="nis"
                                        class="form-control @error('nis') is-invalid @enderror" id="exampleInputEmail3"
                                        placeholder="No. Induk Siswa" value="{{ old('nis') }}">

                                    @error('nis')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Lengkap</label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="exampleInputName1"
                                        placeholder="Nama Lengkap" value="{{ old('nama') }}">

                                    @error('nama')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputCity1">No. Telepon</label>
                                    <input type="tel" name="no_telp"
                                        class="form-control @error('no_telp') is-invalid @enderror"
                                        id="exampleInputCity1" placeholder="No. Telepon" value="{{ old('no_telp') }}">

                                    @error('no_telp')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelectGender">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="jk" class="form-check-input"
                                                name="membershipRadios" id="membershipRadios1" value="laki-laki"
                                                @if (old('jk') == 'laki-laki') checked @endif>
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="jk" class="form-check-input"
                                                name="membershipRadios" id="membershipRadios1" value="perempuan"
                                                @if (old('jk') == 'perempuan') checked @endif>
                                            Perempuan
                                        </label>
                                    </div>

                                    @error('jk')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputName1">Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat"
                                        style="height: 150px; resize: none;">{{ old('alamat') }}</textarea>

                                    @error('alamat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputCity1">Kelas</label>
                                    <select name="kelas_id" class="form-control">
                                        <option disabled selected hidden>Kelas</option>
                                        @foreach ($kelas as $kls)
                                            <option value="{{ $kls->id }}"
                                                @if (old('kelas_id') == $kls->id) selected @endif>Kelas
                                                {{ $kls->kls_angka . $kls->kls_huruf }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputCity1">Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        id="exampleInputCity1" placeholder="Username" value="{{ old('username') }}">

                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputCity1">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="exampleInputCity1" placeholder="Password" value="{{ old('password') }}">

                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputCity1">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="exampleInputCity1" placeholder="Konfirmasi Password"
                                        value="{{ old('password_confirmation') }}">

                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" style="float: right;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.components.foot')
