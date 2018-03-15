<?php

namespace App\View;

class Markdown
{
	/**
	 * Starts a Markdown section
	 */
	public function begin()
	{
		ob_start();
	}

	/**
	 * Ends a Markdown section.
	 */
	public function end()
	{
		return $this->render(ob_get_clean());
	}

	/**
	 * Renders Markdown text.
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	public function render($text)
	{
		return \Parsedown::instance()->parse($text);
	}
}
