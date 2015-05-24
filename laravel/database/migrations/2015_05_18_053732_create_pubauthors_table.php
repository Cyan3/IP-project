<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePubauthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pubauthors', function(Blueprint $table)
		{
            $table->increments('id');
            $table->unsignedInteger('pub_id')
                ->foreign('pub_id')
                ->reference('id')
                ->on('publications')
                ->onDelete('cascade');
            $table->string('name');
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
		Schema::drop('pubauthors');
	}

}
