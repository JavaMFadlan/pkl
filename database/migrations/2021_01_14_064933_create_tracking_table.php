<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nama_neg');
            $table->integer('kode_neg');
            $table->timestamps();
        });

        Schema::create('kasuss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_neg')->constrained('negaras')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sembuh');
            $table->integer('positif');
            $table->integer('meninggal');
            $table->timestamps();
        });

        Schema::create('trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_rw')->constrained('rws')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sembuh');
            $table->integer('positif');
            $table->integer('meninggal');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracking');
    }
}
