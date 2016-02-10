<?php

namespace Brickrouge;

use Brickrouge\Validate\Errors;

$errors = Errors::from([

	'_base' => [

		"Login failed!"

	],

	'username' => [

		"Unknown username/password combination.",
		"Funny username by the way ;-)"

	]

], []);

echo new Alert($errors);
