<table class="table-borderless">
    <tr>
        <th>No. Induk Siswa</th>
        <td>: {{ $siswa->nis }}</td>
    </tr>
    <tr>
        <th>Nama Lengkap</th>
        <td class="text-capitalize">: {{ $siswa->nama }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>: {{ $siswa->alamat }}</td>
    </tr>
    <tr>
        <th>No. Telp</th>
        <td>: {{ $siswa->no_telp }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td class="text-capitalize">: {{ $siswa->jk }}</td>
    </tr>
    <tr>
        <th>Kelas</th>
        <td class="text-capitalize">: {{ $siswa->kelas->kls_angka.$siswa->kelas->kls_huruf }}</td>
    </tr>
</table>
