<?php

namespace Brickrouge;

echo new SplitButton('Action', array(

	Element::OPTIONS => array
	(
		'Action',
		'Another action',
		'Something else here',
		false,
		'Separated link'
	)
));
