<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->decimal('total', 15, 2)
                  ->comment('Tổng tiền đơn (VNĐ)');
            $table->string('status', 50)
                  ->default('pending')
                  ->comment('Trạng thái đơn: pending, processing, completed, cancelled,…');
            $table->string('payment_status', 50)
                  ->default('pending')
                  ->comment('Trạng thái thanh toán: pending, paid, failed');
            $table->string('payment_ref', 100)
                  ->nullable()
                  ->comment('Mã giao dịch VNPAY (vnp_TxnRef)');
            $table->timestamps();
            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
