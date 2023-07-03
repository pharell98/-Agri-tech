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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->string('nom');
            $table->string('adresse');
            $table->mediumText('panier');
            $table->string('payement_id');
            $table->integer('montant');
            $table->string('lieulivraison');
            $table->integer('prixlivraison');
            $table->boolean('is_evaluated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
