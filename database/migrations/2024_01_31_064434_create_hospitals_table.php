<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('hospitals', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->text('place_located');
                $table->text('phone_number');
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('hospitals');
        }
    };
