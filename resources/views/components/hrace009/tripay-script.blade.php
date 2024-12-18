<script src="{{ asset('js/jquery.js') }}"></script>
<script>
  
</script>
<script>
    
    function gagalDonasi() {
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
            title: 'Terjadi kesalahan, silakan coba lagi.',
        })
    }
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
            title: '',
        
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
            title: '{{ __('donate.tripay.error.minimum', ['min' => config('tripay.minimum'), 'currency' => config('pw-config.currency_name') ]) }}',
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
            title: '{{ __('donate.tripay.error.maximum', ['max' => config('tripay.maximum'), 'currency' => config('pw-config.currency_name') ]) }}',
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

    function calculateCoins(amount) {
    minimum = "{{ config('tripay.minimum') }}";
    maximum = "{{ config('tripay.maximum') }}";

    const coins = amount; // Karena 1 Coin = 1 IDR
    return Math.min(Math.max(coins, minimum), maximum); // Pastikan dalam batas minimum & maksimum
}


    $(function () {

        // Seleksi elemen dari DOM
        const options = document.querySelectorAll('.option');
        const customInput = document.getElementById('custom-amount');
        const customAmountBtn = document.getElementById('custom-amount-btn');
        const paymentModal = document.getElementById('payment-modal');
        const continuePayment = document.getElementById('continue-payment');
        const closeModalBtn = document.getElementById('close-modal');

        // Variabel global untuk menyimpan nominal yang dipilih
        let selectedAmount = null;

        // Fungsi memformat angka ke format Rupiah
        function formatRupiah(value) {
            return 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan pemisah ribuan
        }

        // Format input custom nominal
        if (customInput) {
            customInput.addEventListener('input', (e) => {
                let value = e.target.value;
                // Hapus semua karakter non-digit
                value = value.replace(/[^0-9]/g, '');

                e.target.value = formatRupiah(value);
            });
        }

     
        options.forEach(option => {
            option.addEventListener('click', () => {
                selectedAmount = option.getAttribute('data-value'); 
                openModal();
            });
        });


        if (customAmountBtn) {
            customAmountBtn.addEventListener('click', () => {
                const rawValue = customInput.value.replace(/[^0-9]/g, ''); 
                    minimum = "{{ config('tripay.minimum') }}";
                    maximum = "{{ config('tripay.maximum') }}";
                    // Batasi hingga maximum
                    console.log( 'rawValue : ' + rawValue , 'maximum : ' + maximum , 'minimum : ' + minimum );
                    // rawValue :  maximum : 50000 minimum : 100
                  
                if (rawValue) {
                    if (parseFloat(rawValue) > maximum) {
                        showMaximum();
                        return false;
                        }
                        // Batasi hingga minimum
                        if (parseFloat(rawValue) < minimum) {
                            showMinimum();
                            return false;
                        }
                        selectedAmount = rawValue; 
                        openModal();
                        // const coinsEarned = calculateCoins(rawValue); // Hitung jumlah koin
                        // document.getElementById('coin-result').innerText = `Anda akan mendapatkan ${coinsEarned} Coin.`;

                 
                } else {
                    showMinimum();
                }
            });
        }


        function openModal() {
            if (paymentModal) {
                paymentModal.classList.remove('hidden');
            }
        }

 
        function closeModal() {
            if (paymentModal) {
                paymentModal.classList.add('hidden');
            }
        }

        if (continuePayment) {
            continuePayment.addEventListener('click', () => {
                const paymentMethod = document.getElementById('payment-method')?.value || '';
                const bonusVoucher = document.getElementById('bonus-voucher')?.value || '';
                const promoCode = document.getElementById('bonus-voucher')?.value || ''; // Promo code tetap diperiksa, tapi boleh kosong

                if (!selectedAmount || !paymentMethod) {
                    alert('Silakan pilih nominal dan metode pembayaran terlebih dahulu.');
                    return;
                }

                continuePayment.disabled = true;
                continuePayment.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Memproses...</span>
                `;

                const checkPromo = promoCode
                    ? $.post("/dashboard/promo", { 
                        promo_code: promoCode, 
                        _token: '{{ csrf_token() }}' 
                    })
                    : Promise.resolve({ valid: true }); // Jika promo kosong, langsung valid

                // Proses promo (jika ada) sebelum lanjut pembayaran
                checkPromo
                .then((promoResponse) => {
                    if (promoCode && !promoResponse.valid) {
                        // Promo tidak valid (hanya jika diisi)
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Promo Code',
                            text: 'Kode promo yang Anda masukkan tidak valid.',
                        });

                        continuePayment.disabled = false;
                        continuePayment.innerHTML = `Lanjutkan Pembayaran`;
                        return; // Stop jika promo tidak valid
                    }

                    // Promo valid atau kosong, lanjutkan ke pembayaran
                    $.post("{{ route('app.donate.tripay.submit') }}", {
                        _token: '{{ csrf_token() }}', 
                        amount: selectedAmount,
                        payment_method: paymentMethod,
                        bonus_voucher: bonusVoucher,
                    })
                    .done((paymentResponse) => {
                        // Redirect ke halaman pembayaran
                        window.location.href = paymentResponse.data.checkout_url;
                        closeModal();
                    })
                    .fail((error) => {
                        console.error(error);
                        closeModal();
                        gagalDonasi();
                    })
                    .always(() => {
                        // Reset tombol setelah selesai
                        continuePayment.disabled = false;
                        continuePayment.innerHTML = `Lanjutkan Pembayaran`;
                    });
                })
                .catch((error) => {
                    console.error('Error checking promo:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memeriksa promo code. Silakan coba lagi.',
                    });

                    // Reset tombol jika terjadi error saat cek promo
                    continuePayment.disabled = false;
                    continuePayment.innerHTML = `Lanjutkan Pembayaran`;
                });
            });
        }



        if (paymentModal) {
            paymentModal.addEventListener('click', (e) => {
                if (e.target === paymentModal) {
                    closeModal();
                }
            });
        }

        // Tutup modal jika tombol close diklik
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                closeModal();
            });
        }

   

    });
</script>
