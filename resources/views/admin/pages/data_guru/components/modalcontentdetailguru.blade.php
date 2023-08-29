<table class="table-borderless">
    <tr>
        <th>No. Induk Pegawai</th>
        <td>: {{ $guru->nip }}</td>
    </tr>
    <tr>
        <th>Nama Lengkap</th>
        <td class="text-capitalize">: {{ $guru->nama }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>: {{ $guru->alamat }}</td>
    </tr>
    <tr>
        <th>No. Telp</th>
        <td>: {{ $guru->no_telp }}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td class="text-capitalize">: {{ $guru->jk }}</td>
    </tr>
</table>
