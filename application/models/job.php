<?php
	class Job extends Eloquent
	{
		public function users()
		{
			return $this->belongs_to('user');
		}
		
	}