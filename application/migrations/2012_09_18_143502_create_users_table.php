<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($users)

		{
			$users->increments('id');
			$users->string('username',128);
			$users->string('email',128);
			$users->string('password',64);
			
			$users->timestamps();

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('users');
	}

}