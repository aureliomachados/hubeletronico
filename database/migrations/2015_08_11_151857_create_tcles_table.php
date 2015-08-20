<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tcles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('paciente');
            $table->string('prontuario');
            $table->date('data_nascimento');
            $table->integer('rg');
            $table->string('orgao');
            $table->string('uf');
            $table->string('diagnostico');
            $table->string('procedimento');
            $table->string('anestesia');
            $table->string('responsavel');
            $table->string('parentesco_responsavel');
            $table->string('rg_responsavel');
            $table->string('cpf_responsavel');

            $table->integer('estados_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();

            $table->foreign('estados_id')->references('id')->on('estados');
            $table->foreign('user_id')->references('id')->on('users');

        });
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('tcles');
	}

}
