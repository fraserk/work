<?php

	/**
	* User Model
	*/
	class User extends Eloquent
	{
		public function jobs()
		{
			return $this->has_many('Job');
		}
		
	}

	