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
	*/

	public function index() {
		echo view('partials/header');
    echo view('index');
    echo view('partials/footer');
	}

	public function test()
	{
	}

}
