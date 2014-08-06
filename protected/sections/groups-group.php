<?php

namespace Brickrouge;

echo new Group(array(

	Element::LEGEND => "What's your name ?",
	Element::CHILDREN => array
	(
		'lastname' => new Text(array(

			Form::LABEL => 'Lastname',
			Element::WEIGHT => '1',
			'type' => 'text',
			'value' => 'Laviale'
		)),

		'firstname' => new Text(array(

			Form::LABEL => 'Firstname',
			'type' => 'text',
			'value' => 'Olivier'
		)),

		'salutation' => new Salutation(array(

			Element::WEIGHT => 'firstname:before',
			'value' => 2
		))
	),

	'class' => 'form-horizontal'
));

