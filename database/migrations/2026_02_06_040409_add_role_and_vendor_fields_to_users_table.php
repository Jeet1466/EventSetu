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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['client', 'admin', 'vendor'])->default('client');
            $table->foreignId('vendor_category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('price_range_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['vendor_category_id']);
            $table->dropForeign(['price_range_id']);
            $table->dropColumn(['role', 'vendor_category_id', 'price_range_id']);
        });
    }
};
