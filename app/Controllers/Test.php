<?php namespace App\Controllers;

class Test extends BaseController
{
	/*
	Pre:
	1. Unless otherwise specified the file referred to is this (/Test).
	2. d() & dd() are global debugging function of Kint included in CI4.

	Procedure:
	1. $baseURL in Config/App.php (Update to your own)
	2. .env environment set to 'development'
	3. Deleted Home controller and created Test controller
	4. Added header and footer partials as well as index.php to App/Views
	5. Routing updated to Test::index
	6. Test::index utilizes the newly created view files.
	7. Added loadHelper()
	8. Added formHelper()
	9. Added escDemo()
	10. Added csrfDemo()
	11. Added timerDemo()
	12. Added loggerDemo()
	13. Added null()
	14. Added exceptionDemo()
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

	function urlHelper()
	{
		/*
		Unlike other helpers this one is loaded by default
		*/
		d(site_url()); // Returns your site URL, as specified in your config file.
		d(site_url('test?id=1'));
		d(base_url()); // This function returns the same thing as site_url(), without the index.php being appended.
		d(anchor('/test', 'Click Me', 'class="example example-link"')); // recommended way of creating links`
	}

	function escDemo() {
		echo esc('<h1>HTML</h1>');
	}

	function csrfDemo() {
		d(csrf_hash()); // this is a global function that utilizes the Security class getCSRFHash() method
		d(service('security')->getCSRFHash());
	}

	function timerDemo() {
		d(timer());
		timer('x'); //starts timer named x
		sleep(1);
		timer('x'); //stops timer named x
		d(timer()->getElapsedTime('x'));
		d(timer()->getTimers());
	}

	function loggerDemo() {
		/*
		https://codeigniter4.github.io/userguide/general/logging.html?highlight=logger
		Default threshold is 3 -> 1) emergency, 2) alert, 3) critical.
		*/
		log_message('alert', 'This is just a test log.'); // logs an alert log to /writable/logs
	}

	function null() {
		/*
		null-coalesce operator (PHP7)
		This is not CI4-specific but thought I'd add it here for reference.
		It demos how you can default to a value if !isset
		E.g. echo $name ?? 'User'; 
		*/
		d($this->request->getGet('string'));
		echo $this->request->getGet('string') ?? 'Hello World!';
	}

	function exceptionDemo() {
		/*
		Displays exception along with where it occurred when in development mode.
		Otherwise it displays the 'We hit a snag' message from Views/errors/html/production.php
		*/
		throw new \Exception('This is a demo exception.');
	}

}
