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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->decimal("uk2slwh2whP", 8, 2);
            $table->decimal("uk2sld2dwpP", 8, 2);
            $table->decimal("uk2sld2dowpP", 8, 2);
            $table->decimal("uk2slwh2whC", 8, 2);
            $table->decimal("uk2sld2dwpC", 8, 2);
            $table->decimal("uk2sld2dowpC", 8, 2);
            $table->decimal("sl2ukd2d", 8, 2);
            $table->decimal("sl2frd2d", 8, 2);
            $table->decimal("fr2sld2d", 8, 2);
            $table->decimal("sl2itd2d", 8, 2);
            $table->decimal("it2sld2d", 8, 2);
            $table->decimal("sl2cad2d", 8, 2);
            $table->decimal("ca2sld2d", 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
