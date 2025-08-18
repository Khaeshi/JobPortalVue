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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->text('companyDescription')->nullable();
            $table->string('companyLocation')->nullable();
            $table->string('companyWebsite')->nullable();
            $table->string('companyLogo')->nullable();
            $table->integer('companySize')->nullable();
            $table->string('companyIndustry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
