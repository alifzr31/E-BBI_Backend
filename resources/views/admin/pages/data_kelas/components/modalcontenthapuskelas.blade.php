<p>
    Anda yakin ingin menghapus kelas {{ $kelas->kls_angka . $kelas->kls_huruf }}
</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()" aria-label="Close">
        Tutup
    </button>
    <a class="btn btn-danger" href="{{ route('admin-destroykelas', $kelas->id) }}">Hapus Kelas</a>
</div>
</div>
</div>
</div>
