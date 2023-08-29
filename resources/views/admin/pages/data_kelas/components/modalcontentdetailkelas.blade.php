<div class="table-responsive p-3">
    <table class="display table align-items-center table-hover" id="dataTableHover2">
        <thead>
            <tr>
                <th>No. Induk Siswa</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas->siswa as $siswa)
                <tr>
                    <td class="font-weight-bold text-capitalize">{{ $siswa->nis }}</td>
                    <td class="text-capitalize">{{ $siswa->nama }}</td>
                    <td class="text-capitalize">{{ $siswa->jk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
