<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Drop existing foreign key constraint first
        $foreignKeys = collect(DB::select("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = ? AND TABLE_NAME = 'products' AND COLUMN_NAME = 'category_id' AND REFERENCED_TABLE_NAME IS NOT NULL", [DB::getDatabaseName()]));
        foreach ($foreignKeys as $fk) {
            DB::statement("ALTER TABLE products DROP FOREIGN KEY `{$fk->CONSTRAINT_NAME}`");
        }

        // Make category_id nullable
        DB::statement("ALTER TABLE products MODIFY COLUMN category_id BIGINT UNSIGNED NULL");

        // Re-add the foreign key constraint with ON DELETE CASCADE
        DB::statement("ALTER TABLE products ADD CONSTRAINT products_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE");
    }

    public function down(): void
    {
        // Reverse: make category_id NOT NULL again
        // First set any null category_id to 0 or delete those products
        DB::table('products')->whereNull('category_id')->delete();

        $foreignKeys = collect(DB::select("SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = ? AND TABLE_NAME = 'products' AND COLUMN_NAME = 'category_id' AND REFERENCED_TABLE_NAME IS NOT NULL", [DB::getDatabaseName()]));
        foreach ($foreignKeys as $fk) {
            DB::statement("ALTER TABLE products DROP FOREIGN KEY `{$fk->CONSTRAINT_NAME}`");
        }

        DB::statement("ALTER TABLE products MODIFY COLUMN category_id BIGINT UNSIGNED NOT NULL");

        DB::statement("ALTER TABLE products ADD CONSTRAINT products_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE");
    }
};
