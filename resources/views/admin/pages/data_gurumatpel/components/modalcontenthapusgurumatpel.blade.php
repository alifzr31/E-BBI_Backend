<p>
    Anda yakin ingin menghapus guru {{ $gurumatpel->guru->nama }} sebagai pengajar mata pelajaran
    {{ $gurumatpel->matpel->nama_matpel }}
</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()" aria-label="Close">
        Tutup
    </button>
    <a class="btn btn-danger" href="{{ route('admin-destroygurumatpel', $gurumatpel->id) }}">Hapus Kelas</a>
</div>
</div>
</div>
</div>
