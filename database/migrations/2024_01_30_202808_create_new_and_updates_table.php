<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('new_and_updates', function (Blueprint $table) {
                $table->id();
                $table->text('new_title');
                $table->text('new_postacl_card');
                $table->unsignedBigInteger('user_id'); //published by
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('new_and_updates');
        }
    };
