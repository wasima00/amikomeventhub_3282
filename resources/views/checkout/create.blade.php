@extends('layouts.app')
@section('title', 'Checkout - ' . $event->title)
@section('content')
<main class="max-w-3xl mx-auto px-6 py-20">
    <div class="mb-12">
        <a href="{{ route('events.show', $event->id) }}" class="text-indigo-600 font-bold flex items-center gap-2 mb-6 group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Event
        </a>
        <h1 class="text-4xl font-extrabold">Checkout</h1>
        <p class="text-slate-500 mt-2">Lengkapi data Anda untuk mendapatkan tiket.</p>
    </div>

    {{-- Error Alert --}}
    @if(session('error'))
    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl font-bold flex items-center gap-3">
        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('error') }}
    </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
        <ul class="list-disc list-inside text-red-600 text-sm font-medium space-y-1">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 gap-8">
        <!-- Summary Card -->
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6 border-b pb-4">Pesanan Anda</h3>
            <div class="flex gap-6 items-start">
                <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                 ? asset('storage/' . $event->poster_path)
                 : 'https://placehold.co/200x200' }}"
                    alt="Event" class="w-24 h-24 rounded-2xl object-cover">
                <div>
                    <h4 class="font-extrabold text-lg">{{ $event->title }}</h4>
                    <p class="text-slate-500">{{ $event->date->format('d M Y') }} • {{ $event->location }}</p>
                    <p class="text-indigo-600 font-bold mt-2">1 x Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t space-y-3">
                <div class="flex justify-between text-slate-500">
                    <span>Harga Tiket</span>
                    <span>Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-slate-500">
                    <span>Biaya Layanan</span>
                    <span>Rp 5.000</span>
                </div>
                <div class="flex justify-between text-2xl font-black mt-4 pt-4 border-t">
                    <span>Total Bayar</span>
                    <span class="text-indigo-600" id="total-display">Rp {{ number_format($event->price + 5000, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6 italic text-indigo-600 underline underline-offset-8">📦 Data Pemesan
                (Tanpa Login)</h3>
            <form id="checkout-form" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama
                        Lengkap</label>
                    <input type="text" name="customer_name" id="customer_name" placeholder="Masukkan nama sesuai identitas"
                        class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                        required value="{{ old('customer_name') }}">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Email
                            Aktif</label>
                        <input type="email" name="customer_email" id="customer_email" placeholder="contoh@gmail.com"
                            class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                            required value="{{ old('customer_email') }}">
                        <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-tighter">*E-Ticket
                            akan dikirim ke email ini</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">No.
                            WhatsApp</label>
                        <input type="tel" name="customer_phone" id="customer_phone" placeholder="08xxxxxxx"
                            class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium"
                            required value="{{ old('customer_phone') }}">
                    </div>
                </div>

                <button type="submit" id="pay-button"
                    class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition-all flex items-center justify-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Lanjut Pembayaran
                </button>
                <p class="text-center text-xs text-slate-400">Dengan menekan tombol di atas, Anda menyetujui Syarat
                    & Ketentuan kami.</p>
            </form>
        </div>

    </div>
</main>

{{-- Loading Overlay --}}
<div id="loading-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-white rounded-3xl p-10 text-center shadow-2xl max-w-sm mx-4">
        <div class="w-16 h-16 border-4 border-indigo-200 border-t-indigo-600 rounded-full animate-spin mx-auto mb-6"></div>
        <h3 class="text-xl font-bold mb-2">Memproses Pembayaran...</h3>
        <p class="text-slate-500 text-sm">Mohon tunggu, jangan tutup halaman ini.</p>
    </div>
</div>

{{-- Success Modal --}}
<div id="success-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-white rounded-3xl p-10 text-center shadow-2xl max-w-md mx-4 transform transition-all">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h3 class="text-2xl font-black mb-2">Transaksi Berhasil Dibuat!</h3>
        <p class="text-slate-500 mb-2">Order ID: <span id="success-order-id" class="font-mono font-bold text-indigo-600"></span></p>
        <p class="text-slate-400 text-sm mb-8">Pembayaran akan diproses melalui Midtrans setelah integrasi selesai.</p>
        <a href="{{ route('home') }}"
            class="inline-block px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
            Kembali ke Home
        </a>
    </div>
</div>
@endsection

@push('scripts')
{{-- [Phase 2] Midtrans Snap.js CDN akan ditambahkan di sini --}}
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}

<script>
    const checkoutForm = document.getElementById('checkout-form');
    const payButton = document.getElementById('pay-button');
    const loadingOverlay = document.getElementById('loading-overlay');
    const successModal = document.getElementById('success-modal');

    checkoutForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Validasi form
        const name = document.getElementById('customer_name').value.trim();
        const email = document.getElementById('customer_email').value.trim();
        const phone = document.getElementById('customer_phone').value.trim();

        if (!name || !email || !phone) {
            alert('Mohon lengkapi semua data yang diperlukan.');
            return;
        }

        // Show loading
        payButton.disabled = true;
        payButton.innerHTML = '<div class="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div> Memproses...';
        loadingOverlay.classList.remove('hidden');
        loadingOverlay.classList.add('flex');

        try {
            const response = await fetch("{{ route('checkout.store', $event->id) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    customer_name: name,
                    customer_email: email,
                    customer_phone: phone,
                }),
            });

            const data = await response.json();

            if (!response.ok) {
                // Validation errors
                if (data.errors) {
                    let errorMsg = Object.values(data.errors).flat().join('\n');
                    alert(errorMsg);
                } else {
                    alert(data.message || 'Terjadi kesalahan.');
                }
                return;
            }

            // [Phase 2] Di sini akan dipanggil window.snap.pay(data.snap_token, {...})
            // Untuk saat ini, tampilkan success modal
            if (data.success) {
                loadingOverlay.classList.add('hidden');
                loadingOverlay.classList.remove('flex');

                document.getElementById('success-order-id').textContent = data.order_id;
                successModal.classList.remove('hidden');
                successModal.classList.add('flex');
            }

        } catch (error) {
            console.error('Checkout error:', error);
            alert('Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
        } finally {
            payButton.disabled = false;
            payButton.innerHTML = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> Lanjut Pembayaran';
            loadingOverlay.classList.add('hidden');
            loadingOverlay.classList.remove('flex');
        }
    });
</script>
@endpush
