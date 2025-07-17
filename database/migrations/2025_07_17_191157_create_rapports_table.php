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
    $table->dateTime('date');
    $table->text('activiteGene');
    $table->text('remarque');
    $table->integer('nbPers');
    $table->text('visite');
    $table->text('remarqueFait');
    $table->integer('kits');
    $table->integer('nbPersVisitSem');
    $table->string('nEnreg');
    $table->string('depart');
    $table->string('transfert');
    $table->text('casMaladie');
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
