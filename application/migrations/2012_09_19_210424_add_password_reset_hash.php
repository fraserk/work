<?php

class Add_Password_Reset_Hash {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($users)
		{
			$users->string('password_reset_hash',126);
		}
			);

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}