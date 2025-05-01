<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('etudiant_matiere', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('etudiant_id'); // user_id pour les étudiants
        $table->unsignedBigInteger('matiere_id');
        $table->timestamps();

        $table->foreign('etudiant_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant_matiere');
    }
};
