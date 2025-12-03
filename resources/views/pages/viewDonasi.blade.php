@extends('layout.app')

@section('content')
    <style>
        .text-title {
            margin-top: 50px;
        }

        .img-donasi {
            width: 100%;
            height: auto;
            max-width: 1000px;
        }
    </style>

    <div class="container py-5">
        <!-- Judul -->
        <h2 class="text-title text-center fw-bold">AYO BERDONASI</h2>

        <!-- Gambar -->
        <div class="text-center">
            <img src="{{ asset('storage/' . $donasi->gambar) }}" class="img-fluid img-donasi rounded mb-4"
                alt="{{ $donasi->nama_program }}">
        </div>

        <!-- Judul Donasi -->
        <h4>{{ $donasi->nama_program }}</h4>

        <!-- Deskripsi -->
        <p>{{ $donasi->deskripsi }}</p>

        <!-- Nama Lembaga -->
        <div class="d-flex align-items-center mb-3">
            <img src="{{ asset('images/masjidTakhobbar.png') }}" width="40" height="40" class="rounded-circle me-2"
                alt="Lembaga">
            <strong>Masjid Takhobbar</strong>
            <i class="bi bi-patch-check-fill ms-2 text-danger verified-icon"></i>
        </div>

        <!-- Progress Donasi -->
        <div class="mb-3">
            <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-success" style="width: {{ $progress }}%;"></div>
            </div>
            <small class="text-success fw-bold">
                Rp.{{ number_format($terkumpul, 0, ',', '.') }}
            </small>
            terkumpul dari
            @if ($donasi->unlimited_target)
                <strong>∞ Tak Terbatas</strong>
            @else
                <strong>Rp.{{ number_format($target, 0, ',', '.') }}</strong>
            @endif
        </div>

        <!-- Form Donasi dengan tombol Snap -->
        <form id="form-donasi" novalidate>
            <div class="mb-3">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama"
                    required>
                <div class="invalid-feedback">
                    Silahkan masukkan nama Anda!
                </div>
            </div>

            <div class="mb-3">
                <input type="text" name="nominal" id="nominal" class="form-control"
                    placeholder="Masukkan Nominal (Min. Rp10.000)" required>

                <div class="invalid-feedback">
                    Masukkan nominal donasi minimal Rp10.000!
                </div>
            </div>

            <div class="mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email"
                    required>

                <div class="invalid-feedback">
                    Silahkan masukkan email yang valid ! </div>
            </div>

            <button type="button" id="pay-button" class="btn btn-success w-100">Bayar Donasi</button>
        </form>
    </div>

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        function formatRupiah(angka) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        document.getElementById('nominal').addEventListener('input', function(e) {
            this.value = formatRupiah(this.value);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-donasi');
            const payButton = document.getElementById('pay-button');
            const nominalInput = document.getElementById('nominal');

            function setLoading(isLoading) {
                if (isLoading) {
                    payButton.innerHTML =
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...`;
                    payButton.disabled = true;
                } else {
                    payButton.innerHTML = 'Bayar Donasi';
                    payButton.disabled = false;
                }
            }

            payButton.addEventListener('click', function(event) {
                // Ambil nilai nominal sebagai angka
                const nominalValue = parseInt(nominalInput.value.replace(/\./g, '') || 0);

                // Set custom validity jika nominal < 10.000
                if (nominalValue < 10000) {
                    nominalInput.setCustomValidity('Nominal minimal Rp10.000');
                } else {
                    nominalInput.setCustomValidity(''); // valid
                }

                // Validasi form
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }

                const nama = document.getElementById('nama').value;
                const email = document.getElementById('email').value;

                setLoading(true);

                fetch("/donasi/bayar", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            donasi_id: "{{ $donasi->id }}",
                            nama: nama,
                            nominal: nominalValue,
                            email: email
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.snapToken) {
                            window.snap.pay(data.snapToken, {
                                onSuccess: function(result) {
                                    setLoading(false);
                                    window.location.href = "{{ route('donasi') }}";
                                },
                                onPending: function(result) {
                                    console.log('Pending:', result);
                                    setLoading(false);
                                },
                                onError: function(result) {
                                    console.log('Error:', result);
                                    setLoading(false);
                                },
                                onClose: function() {
                                    setLoading(false);
                                }
                            });
                        } else {
                            setLoading(false);
                            alert("Gagal membuat Snap Token. Silakan coba lagi.");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        setLoading(false);
                        alert("Terjadi kesalahan. Silakan coba lagi.");
                    });
            });
        });
    </script>
@endsection
