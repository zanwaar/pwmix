@livewireScripts
<x-hrace009::theme-script />
<x-hrace009::flash-message />
<x-hrace009::accordion-script />
@if (request()->routeIs('news.create') ||
        request()->routeIs('news.edit') ||
        request()->routeIs('shop.create') ||
        request()->routeIs('shop.edit') ||
        request()->routeIs('article.create') ||
        request()->routeIs('article.edit'))
    <x-hrace009::news-script />
@endif
@include('popper::assets')
@if (request()->routeIs('admin.chat.watch'))
    <x-hrace009::chat-script />
@endif
@if (request()->routeIs('app.donate.history'))
    <x-hrace009::history-script />
@endif
@if (request()->routeIs('app.donate.paypal*'))
    <x-hrace009::paypal-script />
@endif
@if (request()->routeIs('app.donate.ipaymu*'))
    <x-hrace009::ipaymu-script />
@endif
@if (request()->routeIs('app.donate.tripay*'))
    <x-hrace009::tripay-script />
@endif
@if (request()->routeIs('app.vote.index'))
<x-hrace009::vote-script />
@endif

@if (request()->routeIs('app.withdraw'))
    <x-hrace009::withdraw-script />
@endif
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('copyRef').addEventListener('click', function() {
            var referralCode = document.getElementById('referral_code').value;
            navigator.clipboard.writeText(referralCode);
            window.onload = copied();
            return false;
        });
    });

    function copied() {
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
            title: 'Code Refferal Copied',
        })
    }
</script>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            // Add any customization options here
        });
    });
</script>
