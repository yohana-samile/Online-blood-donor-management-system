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
        Schema::create('donars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blood_group_id');
            $table->unsignedBigInteger('user_id');
            $table->text('place_of_residence');
            $table->text('phone_number');
            $table->string('gender');
            $table->timestamps();

            $table->foreign('blood_group_id')->references('id')->on('blood_groups');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donars');
    }
};
