<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_societe')->unique();
            $table->string('adresse');
            $table->bigInteger('GSM')->default(null);
            $table->string('email');
            $table->string('pays');
            $table->string('ville');
            $table->integer('code_postall')->default(null);
            $table->softDeletes();
            $table->bigInteger('user_id');
            $table->string('devise');
            $table->string('site_internet')->default(null);
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
        Schema::dropIfExists('societes');
    }
}
