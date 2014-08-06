<?php

function resolve_filename($filename)
{
	if (file_exists($filename))
	{
		return $filename;
	}

	$trace = debug_backtrace();

	foreach ($trace as $point)
	{
		if (empty($point['file']) || $point['file'] == __FILE__)
		{
			continue;
		}

		$pathname = dirname($point['file']) . DIRECTORY_SEPARATOR . $filename . '.php';

		if (file_exists($pathname))
		{
			return $pathname;
		}
	}

	return $filename;
}

function display_source($filename)
{
	$filename = resolve_filename($filename);

	echo '<pre class="code php prettyprint linenums">' . str_replace("\t", "    ", Brickrouge\escape(trim(file_get_contents($filename)))) . '</pre>';
}

function display_demo($filename)
{
	$filename = resolve_filename($filename);

	require $filename;
}

function display_example($filename)
{
	$filename = resolve_filename($filename);

	display_demo($filename);
 	display_source($filename);
}