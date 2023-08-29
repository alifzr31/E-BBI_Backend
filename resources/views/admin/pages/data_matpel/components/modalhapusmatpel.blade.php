{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
<div class="modal fade" id="modalhapusmatpel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitlelabel">Hapus Data Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="Close()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodyhapusmatpel">
            {{-- </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()"
                    aria-label="Close">
                    Tutup
                </button>
                <a class="btn btn-danger" href="{{ route('admin-destroymatpel', $matpel->id) }}">Hapus Pelajaran</a>
            </div>
        </div>
    </div>
</div> --}}

<script>
    function hapus(id) {

        $.get("{{ url('/admin/showdestroymatpel/') }}/" + id, {},
            function(data, status) {
                $("#bodyhapusmatpel").html(data);
                $("#modalhapusmatpel").modal('show');
            });
    }
</script>
