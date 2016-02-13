<?php

namespace App;

use ICanBoogie\Routing\RouteDefinition as Route;

return [

	'index' => [

		Route::PATTERN => '/',
		Route::CONTROLLER => PageController::class,

		'title' => "Brickrouge"

	],

	'brickrouge-js' => [

		Route::PATTERN => '/brickrouge-js',
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
