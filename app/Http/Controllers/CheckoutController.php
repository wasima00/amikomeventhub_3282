<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Render form checkout (Pertemuan 10 §10.4.3)
     */
    public function create(Event $event)
    {
        // Mengambil daftar kategori untuk keperluan menu footer
        $categories = Category::all();

        return view('checkout.create', compact('event', 'categories'));
    }

    /**
     * Store checkout — Validasi, buat transaksi, generate snap token (Pertemuan 10 §10.4.4)
     * 
     * Flow:
     * 1. Validate: name, email, phone (required)
     * 2. Check stock > 0 → back with error jika habis
     * 3. Generate unique order_id: "TRX-{timestamp}-{random5}"
     * 4. Calculate total: price + 5000 (biaya layanan)
     * 5. Create Transaction record (status: Pending)
     * 6. [Phase 2] Build Midtrans params → Snap::getSnapToken()
     * 7. [Phase 2] Save snap_token to transaction
     * 8. Return JSON { snap_token, order_id }
     */
    public function store(Request $request, Event $event)
    {
        // 1. Validasi Input Kredensial Pelanggan
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        // 2. Cegah Check-out Jika Tiket Habis
        if ($event->stock <= 0) {
            return back()->with('error', 'Mohon maaf, tiket untuk acara ini sudah habis.');
        }

        // 3. Generate Kode TRX (Unik)
        $orderId = 'TRX-' . time() . '-' . strtoupper(Str::random(5));

        // 4. Kalkulasi Total: Harga tiket + biaya layanan Rp 5.000
        $totalPrice = $event->price + 5000;

        // 5. Merekam Transaksi ke Database
        $transaction = Transaction::create([
            'event_id'       => $event->id,
            'order_id'       => $orderId,
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price'    => $totalPrice,
            'status'         => 'Pending',
        ]);

        // 6. [Phase 2] Midtrans Snap Token — akan ditambahkan saat integrasi Midtrans
        // Untuk saat ini, return JSON response agar AJAX di frontend bisa handle
        // Setelah Phase 2: return response()->json(['snap_token' => $snapToken, 'order_id' => $orderId]);

        return response()->json([
            'success'  => true,
            'order_id' => $orderId,
            'message'  => 'Transaksi berhasil dibuat! Menunggu integrasi Midtrans untuk pembayaran.',
            // 'snap_token' => $snapToken, // Phase 2
        ]);
    }
}
