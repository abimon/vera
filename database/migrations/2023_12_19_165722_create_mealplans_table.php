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
        Schema::create('mealplans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doc_id');
            $table->string('disease');
            $table->string('mealtype');
            $table->longText('plan');
            $table->string('duration');
            $table->timestamps();
            $table->foreign('doc_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mealplans');
    }
};
