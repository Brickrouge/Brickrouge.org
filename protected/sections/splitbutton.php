<?php

namespace Brickrouge;

?>
<section id="buttonDropdowns">
	<div class="page-header">
		<h1>Split button dropdowns <small>Built on button groups to provide contextual menus</small></h1>
	</div>
	<div class="row">
		<div class="span4">
			<h3>Split button dropdowns</h3>
			<p>Building on the button group styles and markup, we can easily create a split button. Split
				buttons feature a standard action on the left and a dropdown toggle on the right with contextual
				links.</p>
			<div style="padding: 10px; margin-bottom: 9px;" class="well">
				<div style="margin-bottom: 9px;" class="btn-toolbar">
					<?php

					display_demo('splitbutton-one');

					$options = array
					(
						'Action',
						'Another action',
						'Something else here',
						false,
						'Separated link'
					);

					echo new SplitButton('Action', array(Element::OPTIONS => $options, 'class' => 'btn-primary'));

					echo new SplitButton('Danger', array(Element::OPTIONS => $options, 'class' => 'btn-danger'));

					?>
				</div>
				<div class="btn-toolbar">
					<?php

					echo new SplitButton('Success', array(Element::OPTIONS => $options, 'class' => 'btn-success'));

					echo new SplitButton('Info', array(Element::OPTIONS => $options, 'class' => 'btn-info'));

					?>
				</div>
			</div>
		</div>
		<div class="span8">
			<h3>Example code</h3>
			<p>Dropdown menu options are defined using the <code>OPTION</code> attribute, the same
			way options are defined for <code>select</code>, <code>TYPE_CHECKBOX_GROUP</code> or
			<code>TYPE_RADIO_GROUP</code> element, the twist is that <code>false</code> options
			are turned into separators.</p>
			<?php display_source('splitbutton-one') ?>
		</div>
	</div>
</section>