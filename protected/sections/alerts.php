<section id="alerts">
	<div class="page-header">
		<h1>Alerts <small>Success, warning, and error messages</small></h1>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<h3>Error or danger</h3>
			<?php display_example('alerts-danger'); ?>
		</div>
		<div class="col-lg-4">
			<h3>Success</h3>
			<?php display_example('alerts-success'); ?>
		</div>
		<div class="col-lg-4">
			<h3>Information</h3>
			<?php display_example('alerts-info'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<h3>Heading &amp; multi-line</h3>

			<p>Easily extend the standard alert message with two optional classes:
				<code>.alert-block</code> for more padding and text controls and
				<code>.alert-heading</code> for a matching heading.</p>
		</div>

		<div class="col-lg-8">
			<p>The <code>HEADING</code> attribute may be used to define a heading.</p>
			<?php display_example('alerts-block'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<h3>Dismissible alerts</h3>
			<p>Alerts may be dismissible. If a dismissible alert is tied to a form when the alert
			is dismissed the errors of the form are dismissed as well.</p>
		</div>

		<div class="col-lg-8">
			<?php display_example('alerts-dismissible'); ?>
		</div>
	</div>

	<h2>Error collections</h2>

	<div class="row">
	<span class="col-lg-12">
	<p>The <code>Alert</code> class can also render <code>ErrorCollection</code> instances.</p>
	<?php display_example('alerts-errors'); ?>
	</span>
</section>
