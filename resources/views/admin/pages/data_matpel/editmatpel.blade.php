@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pelajaran</h4>
                    <p class="card-description">
                        Edit Data Pelajaran
                    </p>
                    <form action="{{ route('admin-updatematpel', $matpel->id) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail3">Nama Pelajaran</label>
                            <input type="text" name="nama_matpel"
                                class="form-control @error('nama_matpel') is-invalid @enderror" id="exampleInputEmail3"
                                placeholder="Nama Pelajaran" value="{{ $matpel->nama_matpel }}">

                            @error('nama_matpel')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Semester</label>
                            <select name="semester" class="form-control @error('semester') is-invalid @enderror"
                                id="exampleSelectGender">
                                <option selected disabled hidden>Semester</option>
                                <option value="1" @if ($matpel->semester == '1') selected @endif>Semester 1
                                </option>
                                <option value="2" @if ($matpel->semester == '2') selected @endif>Semester 2
                                </option>
                            </select>

                            @error('semester')
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
