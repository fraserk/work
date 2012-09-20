<?php
/**
* This is the job controller
*/
class Job_Controller extends Base_Controller
{
	public $restful=true;

	public function __construct()
	{
		$this->Filter('before','auth')->only(array('edit'));
	}

	public function get_index()
	{	
		
		return View::make('job.index')
						->with('jobs',Job::all());
	}
	public function get_detail($id)
	{
		return View::make('job.detail')
						->with('job',Job::find($id));
	}

	public function get_new()
	{
		return View::Make('job.new');
	}
	
	public function post_save()
	{
		
		
		$rules = array(
				'company' => 'required|min:3',
				'title' => 'required|min:5',
				'location' => 'required',
				'detail' => 'required|min:20',
				'apply' => 'required|min:5'
			);

		$validation = Validator::make(Input::all(), $rules);
			if ($validation->fails())
			{
				return Redirect::to_route('new')
									->with_errors($validation)->with_input();
			}
			{
				
		User::find(Auth::user()->id)->Jobs()->insert(array(
					'company'=>Input::get('company'),
					'title'=>Input::get('title'),
					'location'=>Input::get('location'),
					'detail'=>Input::get('location'),
					'apply'=>Input::get('apply')
			));
		 return Redirect::to_route('home')
							->with('message','Job posted successfully');
			}
	}

	public function get_edit($id)
	{
		$user_id = Auth::user()->id;

		$job = Job::find($id);

		if ($job->user_id == $user_id)
		 {
			
			return View::make('job.edit')
						->with('job',Job::find($id));
		}

		{
			return Redirect::to_route('home')->with('message','Error. you are not the owner of this posting..');
		}

	}
	public function put_update()
	{
		$id = Input::get('id');
		Job::update($id,array(
					'company'=>Input::get('company'),
					'title'=>Input::get('title'),
					'location'=>Input::get('location'),
					'detail'=>Input::get('detail'),
					'apply'=>Input::get('apply')
					));
		return Redirect::to_route('home')
							->with('message','Job updated successfully');
	}
}