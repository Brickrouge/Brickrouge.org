<?php

namespace Brickrouge;

echo new PopoverWidget
(
	array
	(
		Popover::TITLE => "Caching options",
		Popover::INNER_HTML => new Form
		(
			array
			(
				Form::RENDERER => 'Simple',
				Form::CHILDREN => array
				(
					new Text
					(
						array
						(
							Form::LABEL => 'Maximum size of the cache',
							Text::ADDON => 'Mo',

							'class' => 'measure',
							'size' => 4,
							'value' => 8
						)
					),

					new Text
					(
						array
						(
							Form::LABEL => 'Interval between cleanup',
							Text::ADDON => 'minutes',

							'class' => 'measure',
							'size' => 4,
							'value' => 15
						)
					)
				),

				'class' => 'stacked'
			)
		),

		Popover::ANCHOR => "popover-anchor-options",
		Popover::ACTIONS => 'boolean',
		PopoverWidget::VISIBLE => true,

		'class' => 'widget-popover popover contrast fit-content'
	)
);

?>

<button class="spinner" id="popover-anchor-options" title="Configure caching options">The cache size is 8Mo and it's cleaned up every 15 minutes</button>
