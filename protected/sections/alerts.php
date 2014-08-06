<section id="alerts">
	<div class="page-header">
		<h1>Alerts <small>Success, warning, and error messages</small></h1>
	</div>
	<h2>Lightweight defaults</h2>
	<div class="row">
		<div class="span4">
			<h3>Single alert message</h3>
			<p>For a more durable component with less code, we've removed the differentiating look for block
			alerts, messages that com with more padding and typically more text. The class also has changed
			to <code>.alert-block</code>.</p>
		</div>
		<div class="span8">
			<h3>Example alerts</h3>
			<p>Wrap your message and an optional close icon in a div with simple class.</p>
			<?php display_example('alerts-alert'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span4">
			<h3>Goes great with javascript</h3>
			<p>Brickrouge comes with the Javascript needed to support alert messages. Clicking the
			close button removes the alert, and if it's attached to a form it also clears the
			errors on the form.</p>
		</div>

		<div class="span8">
			<?php display_example('alerts-form'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span4">
			<h3>Heading &amp; multi-line</h3>

			<p>Easily extend the standard alert message with two optional classes:
				<code>.alert-block</code> for more padding and text controls and
				<code>.alert-heading</code> for a matching heading.</p>
		</div>

		<div class="span8">
			<p>Use the <code>HEADING</code> attribute to define the heading. The <code>.alert-block</code>
			class is automatically added if the <code>HEADING</code> attribute is defined.</p>
			<?php display_example('alerts-block'); ?>
		</div>
	</div>

	<h2>Contextual alternatives <small>Add optional classes to change an alert's connotation</small></h2>

	<div class="row">
		<div class="span4">
			<h3>Error or danger</h3>
			<?php display_example('alerts-error'); ?>
		</div>
		<div class="span4">
			<h3>Success</h3>
			<?php display_example('alerts-success'); ?>
		</div>
		<div class="span4">
			<h3>Information</h3>
			<?php display_example('alerts-info'); ?>
		</div>
	</div>

	<h2>Error collections</h2>

	<div class="row">
	<span class="span12">
	<p>The <code>Alert</code> class can also render error collections.</p>
	<?php display_example('alerts-errors'); ?>
	</span>
</section>