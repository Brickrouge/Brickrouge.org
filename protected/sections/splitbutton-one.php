<?php

namespace Brickrouge;

echo new SplitButton('Action', [

	Element::OPTIONS => [

		'Action',
		'Another action',
		'Something else here',
		false,
		'Separated link'

	],

	'class' => 'btn-secondary'

]);
