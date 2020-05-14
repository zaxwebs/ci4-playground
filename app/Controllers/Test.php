<?php namespace App\Controllers;

class Test extends BaseController
{
	/*
	Changes:
	1. $baseURL in Config/App.php
	2. .env environment set to 'development'
	3. Deleted Home controller and created Test controller
	4. Added header and footer partials as well as index.php to App/Views
	5. Routing updated to Test::index
	6. Test::index utilizes the newly created view files.
	7. Added loadHelper()
	8. Added formHelper()
	*/

	public function index()
	{
		echo view('partials/header');
    echo view('index');
    echo view('partials/footer');
	}

	public function test()
	{

	}

	public function loadHelper()
	{
		helper('number'); // loads the 'number' helper
		echo number_to_currency(1234.56, 'USD');
	}

	public function formHelper()
	{
		/*
		CSRF field can be enabled via before filter in Config/Filters
		https://codeigniter4.github.io/userguide/libraries/security.html
		*/
		helper('form');
		$attributes = ['class' => 'form', 'id' => 'form'];
		$hidden = ['origin' => 'home'];
		$form = form_open('/test', $attributes, $hidden); // saving to variable for dd-ing
		dd($form); // dump & die
	}

}
