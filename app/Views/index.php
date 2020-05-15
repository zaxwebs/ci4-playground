<div class="container mt-2">
	<h1>Welcome to CI4 Playground</h1>
	<p>A space for experimenting the various features of CodeIgniter 4.</p>
	<div class="row">
	<div class="col-md-8 mb-2">
		<h3>Quick Links</h3>
		<div class="list-group">
		<?php

			$links = [
				'test/loadHelper' => 'Loading a helper',
				'test/formHelper' => 'Form helper demo',
				'test/urlHelper' => 'URL helper demo',
				'test/escDemo' => 'esc() demo',
				'test/loggerDemo' => 'logging demo',
				'test/null' => 'null()',
				'test/exceptionDemo' => 'exception demo',
				'blank' => 'Inspect an empty controller instance',
				'test/controllerValidation' => 'Dissect validation mechanism in controller',
				'test/ValidationClassDemo' => 'Validation class utilization',
			];

			foreach($links as $link => $title) {
				echo anchor($link, $title, 'class="list-group-item list-group-item-action"');
			}

		?>
		</div>
	</div>
	<div class="col-md-4 mb-2">
		<?= anchor('/test/test', 'Quick Access Test Method', 'class="btn btn-primary"') ?>
	</div>
	</div>
</div>