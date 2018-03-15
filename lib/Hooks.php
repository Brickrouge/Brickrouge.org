<?php

namespace App;

use App\View\Blocks;
use App\View\Markdown;
use ICanBoogie\Render\EngineCollection;
use ICanBoogie\Render\MarkdownEngine;
use ICanBoogie\View\View;

class Hooks
{
	static public function on_view_alter(View\AlterEvent $event, View $view)
	{
		$view['blocks'] = new Blocks;
		$view['markdown'] = new Markdown;
	}

	static public function on_alter_engine_collection(EngineCollection\AlterEvent $event, EngineCollection $target)
	{
		$target['.md'] = MarkdownEngine::class;
	}
}
