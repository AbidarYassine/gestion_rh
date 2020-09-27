<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('nom_employer');
            $table->string('prenom');
            $table->string('email');
            $table->date('date_naissance');
            $table->enum('situationFami',['célibataire','marié','pacsé','divorcé ','séparé','veuf']);
            $table->string('sexe');
            $table->bigInteger('Num_cnss');
            $table->integer('nbr_enfant')->default(0);
            $table->bigInteger('Num_Icmr');
            $table->double('salaire',8,2);
            $table->string('image')->default('man.png');
            $table->softDeletes();
            $table->bigInteger('emploi_id');
            $table->bigInteger('societe_id');
            $table->bigInteger('departement_id');
            $table->bigInteger('banque_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
