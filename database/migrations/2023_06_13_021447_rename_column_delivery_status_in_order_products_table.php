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
        Schema::table('order_products', function (Blueprint $table) {
            $table->renameColumn('payment_status','delivery_status');
            $table->unsignedInteger('pincode');
            $table->unsignedBigInteger('mobile');
            $table->string('region');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->renameColumn('delivery_status','payment_status');
            $table->dropColumn('pincode');
            $table->dropColumn('mobile');
            $table->dropColumn('region');
        });
    }
};
