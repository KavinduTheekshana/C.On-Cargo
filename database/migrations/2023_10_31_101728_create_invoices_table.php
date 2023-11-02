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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->string('date')->nullable();
            $table->string('job_number')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('sender_id');
            $table->string('receiver_id');
            $table->string('collection_fee');
            $table->string('handling_fee');
            $table->string('total_fee')->nullable();
            $table->longText('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
