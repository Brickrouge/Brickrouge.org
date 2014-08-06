<?php

namespace Brickrouge;

echo new Pager
(
	'div', array
	(
		Pager::T_COUNT => 100,
		Pager::T_POSITION => 2,
		Pager::T_LIMIT => 10
	)
);
