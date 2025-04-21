<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('category_service_id')
                ->constrained('categorys_services')
                ->onDelete('cascade');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('guest_count');
            $table->text('special_requests')->nullable();
            $table->string('payment_method');
            $table->enum('payment_status', ['Pending', 'Paid', 'Failed'])->default('Pending');
            $table->enum('status', ['Booked', 'Cancelled', 'Completed'])->default('Booked');
            $table->longText('qr_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
