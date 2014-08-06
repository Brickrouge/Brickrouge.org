<?php

namespace Brickrouge;

echo new Form(array(

	Element::CHILDREN => array
	(
		new Text(array('class' => 'input-small', 'placeholder' => "Email")), '&nbsp;',
		new Text(array('class' => 'input-small', 'placeholder' => "Password", 'type' => 'password')), '&nbsp;',
		new Button("Go", array('type' => 'submit'))
	),

	'class' => "well form-inline"
));
