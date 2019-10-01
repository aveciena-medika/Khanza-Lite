<script>
    $(document).ready(function(){
        $('#context-menu').contextmenu({
            target: "#context-menu"
        });
    });
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

</script>