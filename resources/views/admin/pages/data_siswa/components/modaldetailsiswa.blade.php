{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
<div class="modal fade" id="modaldetailsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitlelabel">Detail Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="Close()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodydetailsiswa">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Close()"
                    aria-label="Close">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function show(id) {

        $.get("{{ url('/admin/showsiswa/') }}/" + id, {},
            function(data, status) {
                $("#bodydetailsiswa").html(data);
                $("#modaldetailsiswa").modal('show');
            });
    }
</script>
