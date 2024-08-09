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
        Schema::table('orderlists', function (Blueprint $table) {
            $table->string('order_number')->after('size')->nullable();
            $table->integer('user_id')->after('order_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderlists', function (Blueprint $table) {
            $table->dropColumn('order_number');
            $table->dropColumn('user_id');
        });
    }
};
