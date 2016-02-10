<?php

namespace App;

use ICanBoogie\HTTP\Request;

class PageController extends Controller
{
	protected function action(Request $request)
	{
		$this->view->template = "pages/{$this->route->id}";
	}
}
