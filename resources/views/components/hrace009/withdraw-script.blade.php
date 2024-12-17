<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    function format_number(field_id, decimal_places) {
        const field = $("#" + field_id);
        const new_val = Math.round(field.val() * Math.pow(10, decimal_places)) / Math
            .pow(10, decimal_places);
        if (parseFloat(new_val) !== parseFloat(field.val()) || (field.val().charAt(0) === "0" && field.val().charAt(
                field.val().length - 1) !== ".")) {
            field.val(new_val);
        }
    }

    $(function() {
        $("#rp").on('input', function() {
            format_number("rp", 0);
            $("#coins").val($("#rp").val() * 0.001);
            format_number("coins", 0);
        });
        $("#coins").on('input', function() {
            format_number("rp", 0);
            $("#rp").val($("#coins").val() * 1000);
            format_number("rp", 0);
        });
    });

</script>
<script>
    $(document).ready(function() {
        // Hide the rekening dropdown initially
        $('#metodeWD').prop('selectedIndex', 0);
        $('#rekening').hide();
        $('#coin').hide();

        $('#metodeWD').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'RUPIAH') {
                $('#rekening').show();
                $('#coin').hide();
            } else {
                $('#bankaccount_id').prop('selectedIndex', 0);
                $('#rekening').hide();
                $('#coin').show();
            }
        });
    });

</script>
