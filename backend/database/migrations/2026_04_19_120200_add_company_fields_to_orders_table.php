<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('order_number');
            $table->string('tax_code')->nullable()->after('company_name');
            $table->string('contact_position')->nullable()->after('customer_name');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'tax_code',
                'contact_position',
            ]);
        });
    }
};
