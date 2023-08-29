@include('admin.components.head')

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <p class="card-description">
                        Edit Data User
                    </p>
                    <form action="{{ route('admin-updateuser', $user->id) }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail3">Nama Siswa</label>
                            <input type="text" class="form-control" id="exampleInputEmail3"
                                value="{{ $usr->nama }}" readonly disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="exampleInputEmail3"
                                placeholder="Username" value="{{ $user->username }}">

                            @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" style="float: right;">Submit</button>
                        <a href="{{ route('admin-resetpassworduser', $user->id) }}" class="btn btn-danger mr-2"
                            style="float: right;">Reset Password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.components.foot')
