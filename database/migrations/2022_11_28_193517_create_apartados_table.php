<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            // local
            $table->date('fechapartado');
            $table->date('fechainicio');
            $table->date('fechasalida');
            $table->string('diasrentados');
            $table->string('totalrenta');
            $table->string('adelanto');
            $table->string('resto');
            $table->date('fechavencimiento');
            $table->integer('locales_id')->unsigned();
            $table->foreign('locales_id')->references('id')->on('locales');
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
        Schema::dropIfExists('apartados');
    }
};
