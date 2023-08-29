<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
            {{ date('Y') }}.
            SLB Negeri A Pajajaran Bandung.<br />All rights reserved.</span>
        {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                          with <i class="ti-heart text-danger ml-1"></i></span> --}}
    </div>
</footer>
</div>
</div>
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ url('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ url('admin/js/dataTables.select.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ url('admin/js/off-canvas.js') }}"></script>
<script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ url('admin/js/template.js') }}"></script>
<script src="{{ url('admin/js/settings.js') }}"></script>
<script src="{{ url('admin/js/todolist.js') }}"></script>
<script src="{{ url('admin/js/modal-demo.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ url('admin/js/dashboard.js') }}"></script>
<script src="{{ url('admin/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
</body>

</html>
