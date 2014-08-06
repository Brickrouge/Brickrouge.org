<?php

namespace Brickrouge;

echo new Text
(
	array
	(
		Element::LABEL => 'Text',
		Element::LABEL_POSITION => 'before',

		'value' => 'Brickrouge',
		'readonly' => true
	)
);
