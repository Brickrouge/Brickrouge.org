<?php

namespace App;

use ICanBoogie\Routing\RouteDefinition as Route;

return [

	'index' => [

		Route::PATTERN => '/',
		Route::CONTROLLER => PageController::class,

	],

	'calendar' => [

		Route::PATTERN => '/calendar',
		Route::CONTROLLER => PageController::class,

	]

];
