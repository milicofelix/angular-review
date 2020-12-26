<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProjectsTable.
 */
class CreateProjectsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('owner_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->smallInteger('progress')->unsigned();
            $table->smallInteger('status')->unsigned();
            $table->date('due_date');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
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
		Schema::drop('projects');
	}
}
