<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('citations', function(Blueprint $table)
		{
            $table->increments('id');
            $table->unsignedInteger('pub_id')
                ->foreign('pub_id')
                ->reference('id')
                ->on('publications')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('score')->nullable();
            $table->string('fromdb')->nullable();
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
		Schema::drop('citations');
	}

}
