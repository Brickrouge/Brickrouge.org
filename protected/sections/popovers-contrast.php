<?php

namespace Brickrouge;

echo new PopoverWidget([

	Popover::TITLE => "Caching options",
	Popover::INNER_HTML => new Form([

		Form::RENDERER => Form\GroupRenderer::class,
		Form::CHILDREN => [

			new Text([

				Group::LABEL => 'Maximum size of the cache',
				Text::ADDON => 'Mo',

				'class' => 'measure',
				'value' => 8

			]),

			new Text([

				Group::LABEL => 'Interval between cleanup',
				Text::ADDON => 'Min',

				'class' => 'measure',
				'value' => 15

			])

		],

		'class' => 'stacked'

	]),

	Popover::ANCHOR => "popover-anchor-options",
	Popover::ACTIONS => 'boolean',
	PopoverWidget::VISIBLE => true,

	'class' => 'popover fit-content contrast'

]);

?>

<button class="form-control form-control-inline" id="popover-anchor-options" title="Configure caching options">The cache size is 8Mo and it's cleaned up every 15 minutes</button>
