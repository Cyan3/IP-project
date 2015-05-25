<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('usr_id')->foreign('usr_id')
                ->reference('id')
                ->on('usrs')
                ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('year')->nullable();
            $table->string('location')->nullable();
            $table->string('isbn')->nullable();
            $table->string('issn')->nullable();
            $table->integer('score')->nullable();
            $table->integer('categoryScore')->nullable();

            $table->boolean('i_CitiSeer')->nullable();
            $table->boolean('i_DBLP')->nullable();
            $table->boolean('i_Scholar')->nullable();
            $table->boolean('i_Scopus')->nullable();
            $table->integer('querry_id')->nullable();

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
		Schema::drop('publications');
	}

}
