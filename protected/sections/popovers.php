<section id="popovers">
	<div class="page-header">
		<h1>Popovers <small>overlays of information or action</small></h1>
	</div>

	<div class="row">
		<div class="span3">
			<h3>About popovers</h3>
			<p>Add small overlays of content to any element for housing secondary information.</p>
		</div>

		<div class="span9">
			<h2>Example hover popover</h2>
			<p>Hover over the button to trigger the popover.</p>
			<div class="well"><a href="javascript://" class="btn btn-danger" rel="popover" data-title="A title" data-content="And here's some amazing content. It's very engaging. right?" data-animate="true" data-placement="after">hover for popover</a></div>
			<?php display_source('popovers-rel') ?>
		</div>
	</div>

	<div class="row">
		<div class="span3">
			<h2>Anchored to an element</h2>
			<p>Popovers are usually anchored to an element and can follow it on the page,
			wherever it goes, adjusting their box trying to stay as much visible as possible.</p>
		</div>

		<div class="span9">
			<div class="well popover-well">
			<?php display_demo('popovers-popover') ?>
			<img src="/assets/icybee.jpg" class="large-icybee" id="popover-anchor-0" style="display: block; width: 210px; margin-left: auto; opacity: .1">
			</div>

			<?php display_source('popovers-popover') ?>
		</div>
	</div>

	<div class="row">
		<div class="span3">
			<h2>Placement</h2>
			<p>Popover elements can be placed all around their anchor: before, after, above or below.</p>

			<p>Popover elements are automatically repositioned to follow their anchor and may change their
			placement according to the available space around it.</p>

			<p>If the there is not enough available space for the right popover it will jump to
			the left of the anchor.</p>
		</div>

		<div class="span9">
			<div class="well popover-well">
				<img src="/assets/icybee.jpg" id="popover-anchor-1" style="display: block; width: 210px; margin-left: auto; opacity: .1">
			</div>

			<?php display_example('popovers-placement') ?>
		</div>
	</div>

	<div class="row">
		<div class="span3">
			<h2>Contrast and actions</h2>
			<p>Contrast can be used to indicate that the content of the popover is not directly
			related to the current page.</p>

			<p>Popovers can be used to provide a way to edit complex data which are presented
			more simply on the page.</p>
		</div>

		<div class="span9">
			<?php display_example('popovers-contrast') ?>
		</div>
	</div>
</section>