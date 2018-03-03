<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancoDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banco_dados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->integer('ambiente');
            $table->string('data_base');
            $table->string('ip_host');
            $table->string('user');
            $table->string('password')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('banco_dados');
    }
}
