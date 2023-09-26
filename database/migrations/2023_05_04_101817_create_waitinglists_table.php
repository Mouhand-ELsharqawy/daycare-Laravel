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
        Schema::create('waitinglists', function (Blueprint $table) {
            $table->id();
            $table->string('familyname');
            $table->string('address');
            $table->string('phone')->unique();
            $table->text('comments');
            $table->date('dateplacement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waitinglists');
    }
};
