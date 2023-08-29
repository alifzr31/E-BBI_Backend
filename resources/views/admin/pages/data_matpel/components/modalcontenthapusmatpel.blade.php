<p>
    Apakah anda yakin ingin menghapus mata pelajaran {{ $matpel->nama_matpel }} semester {{ $matpel->semester }}
</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()" aria-label="Close">
        Tutup
    </button>
    <a class="btn btn-danger" href="{{ route('admin-destroymatpel', $matpel->id) }}">Hapus Pelajaran</a>
</div>
</div>
</div>
</div>
