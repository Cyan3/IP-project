<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreQuerryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('score_querry', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('pub_q_id')->nullable();

            $table->double('sumSPScore',15,2)->nullable();
            $table->double('sumIRScore',15,2)->nullable();

            $table->double('sumByCategoryIRA',15,2)->nullable();
            $table->double('sumByCategoryIRB',15,2)->nullable();
            $table->double('sumByCategoryIRC',15,2)->nullable();
            $table->double('sumByCategoryIRD',15,2)->nullable();

            $table->double('sumByCategorySPA',15,2)->nullable();
            $table->double('sumByCategorySPB',15,2)->nullable();
            $table->double('sumByCategorySPC',15,2)->nullable();
            $table->double('sumByCategorySPD',15,2)->nullable();

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
		Schema::drop('score_querry');
	}

}
