<section id="form">
	<div class="page-header"><h1>The big form</h1></div>

	<div class="row">
		<div class="span4">
			<p>The form here against is entirely created, filled and validated using Brickrouge.</p>

			<p>Every elements of the form are objects instanciated from the
			<a href="https://github.com/Brickrouge/Brickrouge/blob/master/lib/element/element.php">Element</a> class or one
			of its subclasses.</p>

			<p>Submit the form and see how it repopulates its fields with the values you submited, and
			how it handles errors.</p>

			<p class="small">The source code of the form is available here after.</p>
		</div>

		<div class="span8">
			<div class="example"><?php echo $form ?></div>
			<?php display_demo('protected/form.php') ?>
		</div>
	</div>

	<div class="row">
	<div class="span12">
	<?php display_source('protected/form.php') ?>
	</div>
	</div>

	<div class="row">
		<div class="span4">
			<h2>Validating a form</h2>
			<p>You can ask a form to validate the data provided by the user. Errors are collected in a
			<code>ICanBoogie\Errors</code> object. The method search for required values before
			validation.</p>

<pre class="prettyprint">&lt;?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $errors = new \ICanBoogie\Errors();
    $form->validate($_POST, $errors);
}
</pre>
		</div>

		<div class="span4">
			<h2>Traversing a form</h2>
			<p>Forms are traversed recursively. This comes handy when you need to alter a bunch of
			elements, or simply display their lovely names as the example below.</p>

			<?php display_source('form-traversing-s') ?>

			<div class="alert alert-info"><?php display_demo('form-traversing') ?></div>
		</div>

		<div class="span4">
			<h2>Disabling a form <small>and all of its elements</small></h2>
			<p>A form and all of its elements can be easily disabled using the <code>disabled</code>
			attribute:</p>

			<pre class="prettyprint">&lt;?php

$form['disabled'] = true;</pre>
		</div>
	</div>

</section>