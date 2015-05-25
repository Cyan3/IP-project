<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSumByCategoryIRTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sumByCategoryIR', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('pub_id')
                ->foreign('pub_id')
                ->reference('id')
                ->on('publications')
                ->onDelete('cascade');
            $table->string('A');
            $table->string('B1');
            $table->string('B2');
            $table->string('D');
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
		Schema::drop('sumByCategoryIR');
	}

}
