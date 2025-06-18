@extends('layout.app')

@section('content')
<div class="container text-center py-5" style="margin-top: 50px;">
    <h3>Silakan Lanjutkan Pembayaran</h3>
    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log('Success:', result);
                // redirect ke halaman sukses, jika perlu
            },
            onPending: function(result) {
                console.log('Pending:', result);
            },
            onError: function(result) {
                console.log('Error:', result);
            },
            onClose: function() {
                alert('Anda menutup popup pembayaran!');
            }
        });
    });
</script>
@endsection
