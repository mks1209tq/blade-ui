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
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('file_name');
            $table->boolean('is_data_correct')->nullable()->default(0);
            $table->boolean('is_data_entered')->nullable()->default(0);
            $table->date('passport_expiry_date')->nullable();
            $table->date('visa_expiry_date')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('is_passport')->nullable()->default(0);
            $table->boolean('is_visa')->nullable()->default(0);
            $table->boolean('is_photo')->nullable()->default(0);
            $table->boolean('is_no_file_uploaded')->nullable()->default(0);
            $table->string('issue')->nullable();
            $table->integer('verify_count')->nullable();
            $table->boolean('re_entry')->nullable();
            $table->integer('verifier_id')->nullable();
            $table->integer('verifier1_id')->nullable();
            $table->integer('verifier2_id')->nullable();
            $table->integer('verifier1')->nullable();
            $table->integer('verifier2')->nullable();
            $table->boolean('is_issue')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passports');
    }
};
