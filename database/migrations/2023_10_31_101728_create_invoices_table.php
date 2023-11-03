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
            $table->string('invoice_id');
            $table->string('date');
            $table->string('job_number');
            $table->string('customer_id')->nullable();
            $table->string('sender_id');
            $table->string('receiver_id');
            $table->string('collection_fee')->nullable();
            $table->string('handling_fee')->nullable();
            $table->string('total_fee');
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
