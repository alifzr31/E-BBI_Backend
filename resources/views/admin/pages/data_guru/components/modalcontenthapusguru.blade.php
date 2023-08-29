<p>
    Apakah anda yakin ingin menghapus guru bernama {{ $guru->nama }}?
</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()" aria-label="Close">
        Tutup
    </button>
    <a class="btn btn-danger" href="{{ route('admin-destroyguru', $guru->id) }}">Hapus Guru</a>
</div>
</div>
</div>
</div>
