<?php

namespace Brickrouge;

echo new Element
(
	Element::TYPE_CHECKBOX_GROUP, array
	(
		Form::LABEL => 'Options',
		Element::DEFAULT_VALUE => array('option1' => true, 'option2' => true, 'option3' => true),
		Element::DESCRIPTION => 'Please select an option.',
		Element::OPTIONS => array
		(
			'option1' => "Option one is this and that—be sure to include why it’s great",
			'option2' => "Option two can also be checked and included in form results",
			'option3' => "Option three can—yes, you guessed it—also be checked and included in form results",
			'option4' => "Option four cannot be checked as it is disabled."
		),
		Element::OPTIONS_DISABLED => array('option4' => true),

		'class' => 'inputs-list'
	)
);
