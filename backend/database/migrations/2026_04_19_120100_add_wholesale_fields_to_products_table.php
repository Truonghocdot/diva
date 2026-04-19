<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('slug');
            $table->string('unit')->nullable()->after('sale_price');
            $table->unsignedInteger('min_order_quantity')->default(1)->after('unit');
            $table->string('pack_size')->nullable()->after('min_order_quantity');
            $table->unsignedSmallInteger('lead_time_days')->nullable()->after('pack_size');
            $table->string('origin')->nullable()->after('lead_time_days');
            $table->text('short_description')->nullable()->after('description');
            $table->json('applications')->nullable()->after('images');
            $table->text('specifications')->nullable()->after('applications');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'sku',
                'unit',
                'min_order_quantity',
                'pack_size',
                'lead_time_days',
                'origin',
                'short_description',
                'applications',
                'specifications',
            ]);
        });
    }
};
