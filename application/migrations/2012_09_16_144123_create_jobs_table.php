<?php

class Create_Jobs_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jobs', function($jobs)
		{
			$jobs->increments('id');
			$jobs->integer('user_id');
			$jobs->string('title', 128);
			$jobs->string('company');
			$jobs->string('location', 128);
			$jobs->text('detail');
			$jobs->text('apply');
			$jobs->timestamps();

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jobs');
	}

}