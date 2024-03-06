<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('donor_notifications', function (Blueprint $table) {
                $table->id();
                $table->string('region_to_be_conducted');
                $table->string('district_to_be_conducted');
                $table->string('ward_to_be_conducted');
                $table->string('street_to_be_conducted');
                $table->string('place_to_be_conducted');
                $table->string('sms_notification');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('donor_notifications');
        }
    };
