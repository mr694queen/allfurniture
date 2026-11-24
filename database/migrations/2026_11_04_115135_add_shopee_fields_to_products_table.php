<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('shopee_url')->nullable()->after('badge');
            $table->string('shopee_store_name')->nullable()->after('shopee_url');
            $table->text('shopee_notes')->nullable()->after('shopee_store_name');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['shopee_url', 'shopee_store_name', 'shopee_notes']);
        });
    }
};
