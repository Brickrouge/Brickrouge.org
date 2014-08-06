<section id="forms">
	<div class="page-header"><h1>Forms</h1></div>

	<h2>Example forms <small>using just form controls, no extra markup</small></h2>
	<div class="row">
		<div class="span4">
		<h3>Basic form</h3>
		<p>If there is no rendered defined for the form, its children and simply concatened when
		it's rendered.</p>
		<?php display_demo('forms-basic'); ?>
      	</div>

		<div class="span8"><?php display_source('forms-basic'); ?></div>
	</div>

    <div class="row">
		<div class="span4">
			<h3>Search form</h3>
			<p>Reflecting default WebKit styles, just add <code>.form-search</code> for extra rounded search fields.</p>
			<?php display_demo('forms-search'); ?>
		</div>

    	<div class="span8"><?php display_source('forms-search'); ?></div>
	</div>

	<div class="row">
		<div class="span4">
			<h3>Inline form</h3>
			<p>Inputs are block level to start. For <code>.form-inline</code> and <code>.form-horizontal</code>, we use inline-block.</p>
			<?php display_demo('forms-inline'); ?>
		</div>

		<div class="span8"><?php display_source('forms-inline'); ?></div>
	</div>

	<h2>Horizontal forms</h2>
	<div class="row">
		<div class="span8"><?php display_example('forms-horizontal') ?></div>
		<div class="span4">
			<div class="form-docs">
				<h3>What's included</h3>
				<p>Shown on the left are all the default form controls we support. Here's the bulleted list:</p>
				<ul>
					<li>text inputs (text, password, email, etc)</li>
					<li>checkbox</li>
					<li>radio</li>
					<li>select</li>
					<li>multiple select</li>
					<li>file input</li>
					<li>textarea</li>
				</ul>
			</div>
		</div>
	</div>

	<br />
	<div class="row">
		<div class="span8"><?php display_example('forms-states') ?></div>
		<div class="span4">
			<div class="form-docs">
				<h3>Form validation</h3>
				<p>
				The <code>STATE</code> attribute defines state of the input element,
				possible values are <code><em>null</em></code>, <code>error</code>,
				<code>warning</code> or <code>success</code>. <code>Group</code> elements use
				the corresponding class to highlight the element.</p>

				<pre class="prettyprint">&lt;?php echo new Text(array(Element::STATE => 'error', Element::INLINE_HELP => "The value should not be blue"));</pre>
				<p>
					When the form is validated using its
					<code>validate()</code>
					method it automatically sets the state of its elements.
				</p>
			</div>
		</div>
	</div>

	<br />

	<div class="row">
		<div class="span8"><?php display_demo('forms-extending') ?></div>
		<div class="span4">
			<div class="form-docs">
				<h3>Prepend &amp; append inputs</h3>
				<p><code>Text</code> inputs&mdash;with appended or prepended text&mdash;provide an easy way to give more
				context for your inputs. Great examples include the @ sign for Twitter usernames or $ for
				finances.</p>
				<p>Use the <code>ADDON</code> attribute to define the add-on text, and the
				<code>ADDON_POSITION</code> attribute to define its position: <code>before</code>
				or <code>after</code> the text input.</p>

				<hr />

				<h3>Checkboxes and radios</h3>
				<p>Create checkbox groups and radio groups very easily using the
				<code>TYPE_CHECKBOX_GROUP</code> and <code>TYPE_RADIO_GROUP</code> special
				types.</p>

				<p>Inline checkboxes and radios are also supported. Just add
				<code>.inline-inputs</code> to the group element and you're done.</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="span12"><?php display_source('forms-extending') ?></div>
	</div>
</section>