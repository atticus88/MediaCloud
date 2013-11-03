<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class AppInstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'app:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run application installation.';


	/**
	 * Holds the user information.
	 *
	 * @var array
	 */
	protected $userData = array(
		'username' => '',
		'email'      => '',
		'password'   => ''
		);

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		define('ISCLI', PHP_SAPI === 'cli');
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{

		if(ISCLI)
		{
			$this->comment('=====================================');
			$this->comment('');
			$this->info('  Step: 1');
			$this->comment('');
			$this->info('    Please follow the following');
			$this->info('    instructions to create your');
			$this->info('    default user.');
			$this->comment('');
			$this->comment('-------------------------------------');
			$this->comment('');


			// Let's ask the user some questions, shall we?
			$this->askUserUsername();
			$this->askUserEmail();
			$this->askUserPassword();


			$this->comment('');
			$this->comment('');
			$this->comment('=====================================');
			$this->comment('');
			$this->info('  Step: 2');
			$this->comment('');
			$this->info('    Preparing your Application');
			$this->comment('');
			$this->comment('-------------------------------------');
			$this->comment('');
		}
		else{
			$this->userData['username'] = Input::get('admin-username');
			$this->userData['email'] 	= Input::get('admin-email');
			$this->userData['password'] = Input::get('admin-password');
		}


		// Generate the Application Encryption key
		$this->call('key:generate');

		// // Create the migrations table
		// $this->call('migrate:install');

		// Install Sentry
		$this->call('migrate', array('--package' => 'cartalyst/sentry'));

		// Run the Migrations
		$this->call('migrate');

		$users = User::all();
		if(count($users)){
			Artisan::call('app:refresh');
			die();
		}

		// Create the default user and default groups.
		$this->sentryRunner();

		// Seed the tables with dummy data
		$this->call('db:seed');


	}




	/**
	 * Runs all the necessary Sentry commands.
	 *
	 * @return void
	 */
	protected function sentryRunner()
	{
		// Create the default groups
		$this->sentryCreateDefaultGroups();

		// Create the user
		$this->sentryCreateUser();

		// Create dummy user
		// $this->sentryCreateDummyUser();
	}

	/**
	 * Creates the default groups.
	 *
	 * @return void
	 */
	protected function sentryCreateDefaultGroups()
	{
		try
		{
			// Create the admin group
			Sentry::getGroupProvider()->create(
				array(
					'name'        => 'Admin',
					'permissions' => array(
						'superuser' => 1,

						'admin' => 1,

						'user_getIndex' => 1,
						'user_getCreate' => 1,
						'user_postCreate' => 1,
						'user_getEdit' => 1,
						'user_postEdit' => 1,
						'user_getDelete' => 1,
						'user_getRestore' => 1,

						'asset_getIndex' => 1,
						'asset_getUpload' => 1,
						'asset_postUpload' => 1,
						'asset_getEdit' => 1,
						'asset_postEdit' => 1,
						'asset_getDelete' => 1
						)
					)
				);


			// Show the success message.
			$this->comment('');
			$this->info('Admin group created successfully.');
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			$this->error('Group already exists.');
		}
	}

	/**
	 * Create the user and associates the admin group to that user.
	 *
	 * @return void
	 */
	protected function sentryCreateUser()
	{
		// Prepare the user data array.

		$data = array_merge($this->userData, array(
			'activated'   => 1,
			'permissions' => array(
				'admin' => 1,
				'user'  => 1,
				),
			));

		// Create the user
		$user = Sentry::getUserProvider()->create($data);

		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(1);
		$user->addGroup($group);

		$adminGroup = Sentry::findGroupById(1);

		// Show the success message
		$this->comment('');
		$this->info('Your user was created successfully.');
		$this->comment('');
	}

	/**
	 * Create a dummy user.
	 *
	 * @return void
	 */
	protected function sentryCreateDummyUser()
	{
		// Prepare the user data array.
		$data = array(
			'first_name' => 'John',
			'last_name'  => 'Doe',
			'email'      => 'john.doe@example.com',
			'password'   => 'johndoe',
			'activated'  => 1,
			);

		// Create the user
		Sentry::getUserProvider()->create($data);
	}







	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}


	protected function askUserUsername()
	{
		do
		{
			// Ask the user to input the first name
			$username = $this->ask('Please enter your UserName: (admin) ');

			// Check if the first name is valid
			if ($username == '')
			{
				// Return an error message
				$this->error('Your UserName is invalid. Please try again.');
			}

			// Store the user first name
			$this->userData['username'] = $username;
		}
		while( ! $username);
	}

	protected function askUserEmail()
	{
		do
		{
			// Ask the user to input the email address
			$email = $this->ask('Please enter your user email: ');

			// Check if email is valid
			if ($email == '')
			{
				// Return an error message
				$this->error('Email is invalid. Please try again.');
			}

			// Store the email address
			$this->userData['email'] = $email;
		}
		while ( ! $email);
	}
	protected function askUserPassword()
	{
		do
		{
			// Ask the user to input the user password
			$password = $this->ask('Please enter your user password: ');

			// Check if email is valid
			if ($password == '')
			{
				// Return an error message
				$this->error('Password is invalid. Please try again.');
			}

			// Store the password
			$this->userData['password'] = $password;
		}
		while( ! $password);
	}




}
