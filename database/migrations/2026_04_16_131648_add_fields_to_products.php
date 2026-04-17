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
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->unique()->after('name');
            $table->text('short_description')->nullable()->after('sku');
            $table->string('slug')->unique()->after('image');

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */

        public function down(): void
        {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn([
                    'sku',
                    'short_description',
                    'slug',
                    'meta_title',
                    'meta_description'
                ]);
            });
        }
    
};
