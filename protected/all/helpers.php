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

	return \App\ROOT . $filename;
}

function display_source($filename)
{
	$filename = resolve_filename($filename);
	$html = str_replace("\t", "    ", Brickrouge\escape(trim(file_get_contents($filename))));

	echo <<<EOT
<pre><code class="language-php">$html</code></pre>
EOT;
}

function display_demo($filename)
{
	$filename = resolve_filename($filename);

	require $filename;
}

function display_example($filename)
{
	$filename = resolve_filename($filename);

	echo '<div class="doc-example">';
	display_demo($filename);
	echo '</div>';
 	display_source($filename);
}

function render_partial($partial, array $options = [])
{
	return \ICanBoogie\Render\render([ \ICanBoogie\Render\Renderer::OPTION_PARTIAL => $partial ] + $options);
}
