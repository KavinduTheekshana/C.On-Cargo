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
            $table->string('sltouk1kg');
            $table->string('sltouk2kg');
            $table->string('sltouk3kg');
            $table->string('sltouk4kg');
            $table->string('sltouk5kg');
            $table->string('uktosl1kg');
            $table->string('uktosl2kg');
            $table->string('uktosl3kg');
            $table->string('uktosl4kg');
            $table->string('uktosl5kg');
            $table->string('sltoukpkg');
            $table->string('uktoslpkgpersonal');
            $table->string('uktoslpkgcommercial');
            $table->string('sltoukdeandcolless12');
            $table->string('sltoukdeandcolmore12');
            $table->string('uktosldeandcolless20wp');
            $table->string('uktosldeandcolmore20wp');
            $table->string('uktosldeandcolless20owp');
            $table->string('uktosldeandcolmore20owp');
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
