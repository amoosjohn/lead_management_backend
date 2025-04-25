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
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 100)->index();
            $table->string('last_name', 100)->index();
            $table->string('email', 150)->index();

            $table->string('personal_phone', 150)->nullable()->index();
            $table->string('business_phone', 150)->nullable();
            $table->string('home_phone', 150)->nullable();

            $table->text('description')->nullable();
            $table->string('address')->nullable();

            $table->string('nationality', 100)->nullable()->index();
            $table->string('country_of_residence', 100)->nullable()->index();

            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable()->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
