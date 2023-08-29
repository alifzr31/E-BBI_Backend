{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
<div class="modal fade" id="modalhapussiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitlelabel">Hapus Data Siswa?</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="Close()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodyhapussiswa">
            {{-- </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()"
                    aria-label="Close">
                    Tutup
                </button>
                <a class="btn btn-danger" href="{{ route('admin-destroysiswa', $siswa->id) }}">Hapus Siswa {{$siswa->id}}</a>
            </div>
        </div>
    </div>
</div> --}}

<script>
    function hapus(id) {

        $.get("{{ url('/admin/showdestroysiswa/') }}/" + id, {},
            function(data, status) {
                $("#bodyhapussiswa").html(data);
                $("#modalhapussiswa").modal('show');
            });
    }
</script>
