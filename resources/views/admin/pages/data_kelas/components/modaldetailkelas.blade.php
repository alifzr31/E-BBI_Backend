{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
<div class="modal fade" id="modaldetailkelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitlelabel"></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="Close()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodydetailkelas">
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

<script src="{{ url('https://code.jquery.com/jquery-3.7.0.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
    function show(id, kls_angka, kls_huruf) {
        $.get("{{ url('/admin/showkelas/') }}/" + id, {},
            function(data, status) {
                $("#modaldetailkelas").modal('show');
                $('#modaltitlelabel').text('Detail Kelas '+kls_angka+kls_huruf);
                $("#bodydetailkelas").html(data);
                console.log(status);

                new DataTable('#dataTableHover2');
            });
    }
</script>
