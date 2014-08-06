<?php

namespace Brickrouge;

echo new PopoverWidget
(
	array
	(
		Popover::INNER_HTML => "Popover above, without title.",
		Popover::ANCHOR => "popover-anchor-1",
		Popover::PLACEMENT => 'above',
		PopoverWidget::VISIBLE => true
	)
);

echo new PopoverWidget
(
	array
	(
		Popover::TITLE => "Popover after",
		Popover::INNER_HTML => "Pellentesque vitae ligula et est consequat accumsan.",
		Popover::ANCHOR => "popover-anchor-1",
		Popover::PLACEMENT => 'after',
		PopoverWidget::VISIBLE => true
	)
);

echo new PopoverWidget
(
	array
	(
		Popover::TITLE => "Popover below",
		Popover::INNER_HTML => "Morbi convallis vehicula bibendum. Morbi vestibulum, augue a blandit blandit.",
		Popover::ANCHOR => "popover-anchor-1",
		Popover::PLACEMENT => 'below',
		PopoverWidget::VISIBLE => true
	)
);