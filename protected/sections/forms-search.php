<?php

namespace Brickrouge;

echo new Form(array(

	Element::CHILDREN => array
	(
		new Text(array('class' => 'input-medium search-query')),
		'&nbsp;' .
		new Button("search", array('type' => 'submit'))
	),

	'class' => "well form-search"
));
