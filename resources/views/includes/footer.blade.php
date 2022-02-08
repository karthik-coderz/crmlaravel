<script src="{{ URL::asset('public/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/core/popper.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ URL::asset('public/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ URL::asset('public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ URL::asset('public/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ URL::asset('public/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ URL::asset('public/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ URL::asset('public/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ URL::asset('public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ URL::asset('public/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ URL::asset('public/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ URL::asset('public/assets/js/atlantis.min.js') }}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ URL::asset('public/assets/js/setting-demo.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/demo.js') }}"></script>
<!-- Custom js file -->
<script src="{{ URL::asset('public/assets/js/customs.js') }}"></script>

<script src="{{ URL::asset('public/assets/js/typeahead.min.js') }}"></script>

<script>
    $(':input.orgname').typeahead({
        source: function(query, process) {
            var path = "{{url('autocomplete-search')}}";
            $.get(path, { query: query }, function (data) {
                process(data);
            });
        },
        updater: function(item) {
            $('#hiddenOrganizationId').val(item.id);
            return item;
        }
    });
</script>
