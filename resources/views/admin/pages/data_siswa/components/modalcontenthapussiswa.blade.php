<p>
    Apakah anda yakin ingin menghapus siswa bernama {{ $siswa->nama }}?
</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()" aria-label="Close">
        Tutup
    </button>
    <a class="btn btn-danger" href="{{ route('admin-destroysiswa', $siswa->id) }}">Hapus Siswa</a>
</div>
</div>
</div>
</div>
