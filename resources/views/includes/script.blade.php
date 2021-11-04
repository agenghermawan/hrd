<script script src="{{ asset('assets/aragon/vendor/jquery/dist/jquery.min.js') }}">
</script>

<script src="{{ asset('assets/aragon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"> </script>


<script src="{{ asset('assets/aragon/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/aragon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/aragon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}">
</script>
<script src="{{ asset('assets/aragon/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/aragon/vendor/chart.js/dist/Chart.extension.js') }}"></script>
<script src="{{ asset('js/argon.min.js') }}"></script>


<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

<script src="{{ asset('js/OpenLayers.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/nouislider.js') }}"></script>
<script src="{{ asset('js/jquery.repeater.min.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>

{{-- <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> --}}


<script>
    $(document).ready(function() {
        $("#drop").change(function() {
            var end = this.value;
            $('#EmployeeID').val(end);
            $.ajax({
                url: '/getEmployees/' + end,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#Departement').val(response.data[0].user.Department);
                    $('#Salary').val(response.data[0].SalaryID);
                    console.log(response.data[0].user.Department);
                    console.log(response.data[0].SalaryID);
                }
            })
        });

    });


    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true
        });
    });

</script>


@include('sweetalert::alert')
<script>
    @yield('script')

</script>
