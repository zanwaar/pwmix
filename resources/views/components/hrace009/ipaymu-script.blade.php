<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    function showEmpty() {
        const Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            animation: true,
            html: '{!! __('donate.ipaymu.error.message', ['currency' => config('pw - config.currency_name')]) !!}',
        })
    }

    function showMinimum() {
        const Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            animation: true,
            title: '{{ __('donate.ipaymu.error.minimum', ['min' => config('ipaymu.minimum'), 'currency' => config('pw - config.currency_name')]) }}',
        })
    }

    function showMaximum() {
        const Toast = Swal.mixin({
            toast: false,
            position: 'center',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            animation: true,
            title: '{{ __('donate.ipaymu.error.maximum', ['max' => config('ipaymu.maximum'), 'currency' => config('pw - config.currency_name')]) }}',
        })
    }

    function showPromoValid() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            animation: true,
            title: 'Promo Code Valid',
        })
    }

    function donation_check() {
        dollar_minimum = "{{ config('ipaymu.minimum') }}";
        dollar_maximum = "{{ config('ipaymu.maximum') }}";
        dollars_paypal = $('#donation_tokens').val();
        dollars = $('#donation_dollars').val();
        if (dollars == null || dollars === "" || dollars_paypal == null || dollars_paypal === "") {
            window.onload = showEmpty();
            return false;
        } else if (parseFloat(dollars) < dollar_minimum || parseFloat(dollars_paypal) < dollar_minimum) {
            window.onload = showMinimum();
            return false;
        } else if (parseFloat(dollars) < dollar_maximum || parseFloat(dollars_paypal) > dollar_maximum) {
            window.onload = showMaximum();
            return false;
        } else {
            return true;
        }
    }

    function format_number(field_id, decimal_places) {
        const field = $("#" + field_id);
        const new_val = Math.round(field.val() * Math.pow(10, decimal_places)) / Math
            .pow(10, decimal_places);
        if (parseFloat(new_val) !== parseFloat(field.val()) || (field.val().charAt(0) === "0" && field.val().charAt(field.val().length - 1) !== ".")) {
            field.val(new_val);
        }
    }

    $(function () {
        const per_USD = "{{ config('ipaymu.currency_per') }}";
        const double_donation = "{{ config('ipaymu.double') }}";
        $("#donation_dollars").on('input', function () {
            format_number("donation_dollars", 0);
            $("#donation_tokens").val($("#donation_dollars").val() * (double_donation ? per_USD * 2 : per_USD));
            format_number("donation_tokens", 0);
        });
        $("#donation_tokens").on('input', function () {
            format_number("donation_tokens", 0);
            $("#donation_dollars").val($("#donation_tokens").val() / (double_donation ? per_USD * 2 : per_USD));
            format_number("donation_dollars", 0);
        });
    });
    $(function () {
        $('#checkPromoCode').click(function () {
            $('#result').html('');
            var promoCode = $('#promo_code').val();

            $.ajax({
                url: '/dashboard/promo',
                type: 'POST',
                data: { promo_code: promoCode, _token: '{{ csrf_token() }}' },
                success: function (response) {
                    console.log(response);
                    if (response.valid) {
                        window.onload = showPromoValid();
                        $("#result").html('<div class="bg-green-500 px-4 py-4 rounded">You Will Get 10% PWCoin </div>')
                        return false;
                    } else {
                        $("#result").html('<div class="bg-red-500 px-4 py-4 rounded">Invalid Promo Code</div>')
                        return false;
                    }
                },
                error: function () {
                    alert('An error occurred while checking the promo code.');
                    return false;
                }
            });


        });
    });
</script>