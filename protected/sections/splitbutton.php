<?php

namespace Brickrouge;

?>
<section id="buttonDropdowns">
	<div class="page-header">
		<h1>Split button dropdowns</h1>
	</div>

	<p>Split buttons feature a standard action on the left and a dropdown toggle on the right with
	contextual links.</p>

	<p>Dropdown menu options are defined using the <code>OPTION</code> attribute, the same
		way options are defined for <code>select</code>, <code>TYPE_CHECKBOX_GROUP</code> or
		<code>TYPE_RADIO_GROUP</code> element, the twist is that <code>false</code> options
		are turned into separators.</p>

	<div class="doc-example">
		<?php

		display_demo('splitbutton-one');

		$options = [

			'Action',
			'Another action',
			'Something else here',
			false,
			'Separated link'

		];

		echo PHP_EOL;
		echo new SplitButton('Action', [ Element::OPTIONS => $options, 'class' => 'btn-primary' ]) . PHP_EOL;
		echo new SplitButton('Danger', [ Element::OPTIONS => $options, 'class' => 'btn-danger' ]) . PHP_EOL;
		echo new SplitButton('Success', [ Element::OPTIONS => $options, 'class' => 'btn-success' ]) . PHP_EOL;
		echo new SplitButton('Info', [ Element::OPTIONS => $options, 'class' => 'btn-info' ]) . PHP_EOL;

		?>
	</div>

	<?php display_source('splitbutton-one') ?>

</section>
