<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Menambahkan kolom-kolom untuk integrasi Midtrans & fitur inovasi:
     * - payment_type: jenis pembayaran (credit_card, gopay, dll)
     * - ticket_code: kode tiket unik untuk e-ticket & QR
     * - is_checked_in: status check-in tiket
     * - checked_in_at: waktu check-in
     * - promo_code: kode promo yang digunakan
     * - discount_amount: jumlah diskon
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('payment_type')->nullable()->after('status');
            $table->string('ticket_code')->unique()->nullable()->after('snap_token');
            $table->boolean('is_checked_in')->default(false)->after('ticket_code');
            $table->timestamp('checked_in_at')->nullable()->after('is_checked_in');
            $table->string('promo_code')->nullable()->after('total_price');
            $table->integer('discount_amount')->default(0)->after('promo_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn([
                'payment_type',
                'ticket_code',
                'is_checked_in',
                'checked_in_at',
                'promo_code',
                'discount_amount',
            ]);
        });
    }
};
