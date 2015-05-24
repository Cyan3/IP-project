<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('urls', function(Blueprint $table)
		{
			$table->increments('id');
            $table->unsignedInteger('usr_id')->foreign('usr_id')->reference('id')->on('usrs')->onDelete('cascade');
            $table->string('url');
            $table->string('type_url');
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
		Schema::drop('urls');
	}

}
