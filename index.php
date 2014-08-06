<?php

$reference_time = microtime(true);

require 'startup.php';

require_once 'protected/lib/helpers.php';
require 'protected/form.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$errors = new ICanBoogie\Errors();

	$form->validate($_POST, $errors);
}

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Brickrouge, building webapps and sites</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?= Brickrouge\Document::resolve_url(Brickrouge\ASSETS . 'brickrouge.css') ?>" type="text/css">
<link rel="stylesheet" href="<?= Brickrouge\Document::resolve_url(Brickrouge\ASSETS . 'brickrouge-responsive.css') ?>" type="text/css">
<link rel="stylesheet" href="/assets/google-code-prettify/prettify.css" type="text/css" />
<link rel="stylesheet" href="/assets/page.css" type="text/css" />
</head>
<body>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a href="/" class="brand">Brickrouge</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li><a href="/docs/">Docs</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div id="overview">

		<h1>Brick<span>rouge</span><small> from <a href="http://weirdog.com/" target="_blank" title="Olivier Laviale">me</a></small></h1>

		<p class="lead">Brickrouge is an object-oriented toolkit for PHP5.3+ that
		helps you create inputs, widgets, forms and many other common elements, with
		all the CSS and JavaScript needed to make them beautiful and magical.</p>

		<div class="more">
			<p>Brickrouge uses
			<a href="http://twitter.github.com/bootstrap/" target="_blank">Bootstrap from twitter</a> for its style,
			and <a href="http://mootools.net">MooTools</a> for its magic. Ready in a minute,
			you'll have everything you need to create beautiful and clean webapps.</p>

			<p>Together with <a href="https://github.com/ICanBoogie/ICanBoogie/">ICanBoogie</a>, Brickrouge is one of the
			precious components that make the CMS <a href="http://icybee.org">Icybee</a>, but it
			remains a standalone project for everyone to enjoy!</p>

			<a class="btn btn-large btn-primary" href="https://github.com/Brickrouge/Brickrouge/">View project on GitHub</a>
			<a class="btn btn-large btn-success" href="Brickrouge.phar">Download as a Phar</a>
		</div>

		<div class="benefits">
			<h4><span>✓</span> Feature highlights</h4>

			<ul>
				<li><span>✓</span> Standalone and patchable</li>
				<li><span>✓</span> Compatible with Bootstrap</li>
				<li><span>✓</span> Support localization</li>
				<li><span>✓</span> Is a <a href="https://packagist.org/packages/brickrouge/brickrouge">Composer package</a></li>
				<li><span>✓</span> Object-oriented</li>
				<li><span>✓</span> Create any kind of element</li>
				<li><span>✓</span> Populate and validate forms</li>
			</ul>
		</div>
	</div>

	<ul class="quick-links">
		<li><a href="https://github.com/Brickrouge/Brickrouge/blob/master/README.md" target="_blank">README</a></li>
		<li><a href="/docs/">API documentation</a></li>
		<li><iframe src="http://ghbtns.com/github-btn.html?user=Brickrouge&repo=Brickrouge&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="80px" height="20px"></iframe></li>
		<li><iframe src="http://ghbtns.com/github-btn.html?user=Brickrouge&repo=Brickrouge&type=fork&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="80px" height="20px"></iframe></li>
		<li><a href="https://github.com/Brickrouge/Brickrouge" target="_blank">GitHub</a></li>
		<li><a href="https://github.com/Brickrouge/Brickrouge/issues?state=open" target="_blank">Issues</a></li>
		<li><a href="https://twitter.com/#!/olvlvl" target="_blank" title="Olivier Laviale sur Tweeter">@olvlvl</a></li>
	</ul>

	<?php require 'protected/sections/features.php' ?>

	<?php require 'protected/sections/startup.php' ?>
	<?php require 'protected/sections/form.php' ?>
	<?php require 'protected/sections/groups.php' ?>
	<?php require 'protected/sections/forms.php' ?>
	<?php require 'protected/sections/popovers.php' ?>
	<?php require 'protected/sections/buttons.php' ?>
	<?php require 'protected/sections/splitbutton.php' ?>
	<?php require 'protected/sections/alerts.php' ?>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'] . '/protected/partials/footer.php' ?>

</body>
</html><!-- rendered in <?= (int) ((microtime(true) - $reference_time) * 1000) ?> ms -->