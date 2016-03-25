<?php

namespace App;

use ICanBoogie\Routing\RouteDefinition as Route;

return [

	'index' => [

		Route::PATTERN => '/',
		Route::CONTROLLER => PageController::class,

		'title' => "Brickrouge"

	],

	'forms' => [

		Route::PATTERN => '/forms',
		Route::CONTROLLER => PageController::class,

		'title' => "Forms"

	],

	'widgets' => [

		Route::PATTERN => '/widgets',
		Route::CONTROLLER => PageController::class,

		'title' => "Widgets"

	],

	'calendar' => [

		Route::PATTERN => '/calendar',
		Route::CONTROLLER => PageController::class,

		'title' => 'Calendar'

	],

	'nav' => [

		Route::PATTERN => '/nav',
		Route::CONTROLLER => PageController::class,

		'title' => 'Navigation'

	],

	'autodoc' => [

		Route::PATTERN => '/docs',
		Route::CONTROLLER => PageController::class,

		'title' => 'Autodoc'

	]

];
