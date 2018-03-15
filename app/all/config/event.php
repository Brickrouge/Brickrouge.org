<?php

namespace App;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\View\View::class . '::alter' => $hooks . 'on_view_alter',
	ICanBoogie\Render\EngineCollection::class . '::alter' => $hooks . 'on_alter_engine_collection'

];
