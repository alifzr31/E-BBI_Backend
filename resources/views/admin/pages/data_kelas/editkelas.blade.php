@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Kelas</h4>
                    <p class="card-description">
                        Edit Data Kelas
                    </p>
                    <form action="{{ route('admin-updatekelas', $kelas->id) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleSelectGender">Kelas Angka</label>
                            <select name="kls_angka" class="form-control @error('kls_angka') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Kelas Angka</option>
                                <option value="7" @if ($kelas->kls_angka == '7') selected @endif>7
                                </option>
                                <option value="8" @if ($kelas->kls_angka == '8') selected @endif>8
                                </option>
                                <option value="9" @if ($kelas->kls_angka == '9') selected @endif>9
                                </option>
                            </select>

                            @error('kls_angka')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Kelas Huruf</label>
                            <input type="text" name="kls_huruf"
                                class="form-control @error('kls_huruf') is-invalid @enderror" id="exampleInputEmail3"
                                placeholder="Kelas Huruf" value="{{ $kelas->kls_huruf }}">

                            @error('kls_huruf')
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