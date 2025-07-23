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
    Schema::create('rapports', function (Blueprint $table) {
    $table->id();
    $table->date('date');
    $table->unsignedTinyInteger('mois');
    $table->unsignedSmallInteger('annee');
    $table->unique(['mois', 'annee']);
    $table->text('activiteGene');
    $table->text('remarque');
    $table->integer('nbPres');
    $table->integer('visite');
    $table->text('remarqueFait'); 
    $table->integer('kits');
    $table->integer('nbPersVisitSem');
    $table->integer('nouvelEnreg');
    $table->integer('depart');
    $table->integer('transfert');
    $table->integer ('casMaladie');
    $table->string('superviseur');
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
