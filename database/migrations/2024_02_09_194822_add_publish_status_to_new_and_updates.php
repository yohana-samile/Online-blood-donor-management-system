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
        Schema::table('new_and_updates', function (Blueprint $table) {
            $table->text('publish_status')->default(FALSE);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('new_and_updates', function (Blueprint $table) {
            $table->dropColumn('publish_status');
        });
    }
};
