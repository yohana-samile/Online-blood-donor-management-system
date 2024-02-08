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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //requested by
            $table->unsignedBigInteger('blood_group_id'); //blood request
            $table->string('request_status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('blood_group_id')->references('id')->on('blood_groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
