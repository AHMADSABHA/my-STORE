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
        Schema::table('balance_topup_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('balance_topup_requests', 'added_to_balance')) {
                $table->boolean('added_to_balance')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balance_topup_requests', function (Blueprint $table) {
            if (Schema::hasColumn('balance_topup_requests', 'added_to_balance')) {
                $table->dropColumn('added_to_balance');
            }
        });
    }
};
