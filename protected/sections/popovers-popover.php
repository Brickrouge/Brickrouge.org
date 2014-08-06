<?php

namespace Brickrouge;

echo new PopoverWidget
(
	array
	(
		Popover::TITLE => "Popover",
		Popover::INNER_HTML => "Etiam porta sem malesuada magna mollis euismod. Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.",
		Popover::ANCHOR => "popover-anchor-0",
		Popover::PLACEMENT => 'before',
		PopoverWidget::VISIBLE => true
	)
);
