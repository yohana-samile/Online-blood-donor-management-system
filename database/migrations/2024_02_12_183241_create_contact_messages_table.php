<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('contact_messages', function (Blueprint $table) {
                $table->id();
                $table->text('full_name');
                $table->integer('phone_number');
                $table->text('message');
                $table->text('message_status')->default(false);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('contact_messages');
        }
    };

