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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('surface');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('floor')->nullable();
            $table->string('city');
            $table->text('adress'); // Note: orthographe française conservée
            $table->string('postal_code', 10);
            $table->boolean('sold')->default(false);
            $table->timestamps();
            // Index pour les recherches fréquentes
            $table->index(['city', 'postal_code']);
            $table->index('sold');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
