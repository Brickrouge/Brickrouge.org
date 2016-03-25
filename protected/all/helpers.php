<?php

use ICanBoogie\Render\TemplateName;
use ICanBoogie\Render\TemplateNotFound;

use function ICanBoogie\Render\get_template_resolver;
use function ICanBoogie\Render\get_engines;

function resolve_filename($filename)
{
	if (file_exists($filename))
	{
		return $filename;
	}

	$resolved = get_template_resolver()->resolve(TemplateName::from($filename)->as_partial, get_engines()->extensions, $tried);

	if (!$resolved)
	{
		throw new TemplateNotFound("Template not found for `$filename`.", $tried);
	}

	return $resolved;

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

function render_demo($filename)
{
	ob_start();

	display_demo($filename);

	return ob_get_clean();
}

function render_source($filename)
{
	ob_start();

	display_source($filename);

	return ob_get_clean();
}

function render_example($filename)
{
	ob_start();

	display_example($filename);

	return ob_get_clean();
}
