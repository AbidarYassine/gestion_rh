<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congets', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->integer('durre');
            $table->bigInteger('employer_id');
            $table->softDeletes();
            $table->bigInteger('conget_type_id');
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
        Schema::dropIfExists('congets');
    }
}
