<?php

namespace App\View;

class Blocks
{
	/**
	 * @var array
	 */
	private $blocks = [];

	/**
	 * Starts a block section
	 */
	public function begin()
	{
		ob_start();
	}

	/**
	 * Ends a block section.
	 *
	 * @param string $name Block name
	 */
	public function end($name)
	{
		$rc = ob_get_clean();

		$this->blocks[$name][] = $rc;
	}

	/**
	 * Renders a block.
	 *
	 * @param string $name
	 *
	 * @return string
	 */
	public function render($name)
	{
		if (empty($this->blocks[$name]))
		{
			return '';
		}

		return implode($this->blocks[$name]);
	}
}
