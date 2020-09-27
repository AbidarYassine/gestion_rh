<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinPaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_paies', function (Blueprint $table) {
            $table->id();
            $table->date('date_paie_debut');
            $table->date('date_paie_dfin');
            $table->bigInteger('employer_id');
            $table->integer('cout_heurSup');
            $table->integer('avantage');
            $table->integer('exoneration');
            $table->softDeletes();
            $table->double('sbg');
            $table->double('sbi');
            $table->integer('nbr_heur_sup')->default(null);
            $table->integer('nbr_jour_ferier')->default(null);
            $table->integer('nbr_conget_pay')->default(null);
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
        Schema::dropIfExists('bulletin_paies');
    }
}
