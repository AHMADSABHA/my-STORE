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
            $table->string('image')->nullable()->after('email');
            $table->string('profession')->nullable()->after('image');
            $table->string('phone')->nullable()->after('profession');
            $table->string('address')->nullable()->after('phone');
            $table->enum('role', ['admin', 'salesman', 'customer'])->default('customer')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['image', 'profession', 'phone', 'address', 'role']);
        });
    }
};
