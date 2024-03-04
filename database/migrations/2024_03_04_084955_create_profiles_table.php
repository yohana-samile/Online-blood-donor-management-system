<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('district');
            $table->string('ward');
            $table->string('street');
            $table->string('places')->nullable(true);
            $table->string('gender');
            $table->integer('age')->nullable(true);
            $table->string('phone_number');
            $table->bigInteger('blood_group')->unsigned();
            // $table->bigInteger('user_id')->unsigned();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('profiles');
    }
};
