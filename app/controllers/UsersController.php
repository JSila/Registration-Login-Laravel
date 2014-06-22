<?php

use Laracasts\Validation\FormValidationException;
use JSila\Forms\RegistrationForm;
use JSila\Forms\LoginForm;

class UsersController extends \BaseController {

	protected $user;
	protected $registrationForm;
	protected $loginForm;

	function __construct(User $user, RegistrationForm $registrationForm, LoginForm $loginForm)
	{
		$this->user = $user;
		$this->registrationForm = $registrationForm;
		$this->loginForm = $loginForm;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		try
	    {
	        $this->registrationForm->validate($input);
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::to('/register')->withInput()->withErrors($e->getErrors());
	    }

		$user = $this->user->create($input);

		Event::fire('user.created', [$user]);

	    Session::flash('flash_message', 'Registration was a success! We sent you an email for confirming your account.');

	    return Redirect::home();
	}

	public function loginForm()
	{
	    return View::make('users.login');
	}

	public function login()
	{
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'confirmed' => true
		];

		try
	    {
	        $this->loginForm->validate($credentials);
	    }
	    catch (FormValidationException $e)
	    {
	        return Redirect::to('/login')->withInput()->withErrors($e->getErrors());
	    }
	    
		if (Auth::attempt($credentials, Input::get('remember-me')))
		{
			Session::flash('flash_message', 'You are now logged in!');

			return Redirect::intended('/');
		}

		Session::flash('flash_message', 'Invalid credentials provided or account not active');

		return Redirect::to('/login')->withInput();
	}

	public function logout()
	{
	    Auth::logout();

	    return Redirect::home();
	}

	public function confirm()
	{
	    $user = $this->user->whereActivationCode(Input::get('code'))->first();

	    if ( is_null($user))
	    {
	    	Session::flash('flash_message', 'No user exists with that activation code!');

	    	return Redirect::home();
	    }

	    if ( $user->confirmed)
	    {
	    	return Redirect::home();
	    }

	    $user->confirmed = true;

	    $user->save();

	    Session::flash('flash_message', 'Your email was confirmed and account activated. You may log in now.');

	    return Redirect::home();
	}

}
