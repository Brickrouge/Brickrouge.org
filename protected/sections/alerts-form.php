<?php

namespace Brickrouge;

$values = array('input1' => 'Brickrouge');

$form = new Form(array
(
	Element::CHILDREN => array
	(
		'input0' => new Text(array(Form::LABEL => 'Required', 'required' => true)),
		'input1' => new Text(array(Form::LABEL => 'Optionnal'))
	),

	Form::VALUES => $values,
	Form::RENDERER => 'Simple',

	'class' => 'form-horizontal'
));

$errors = new \ICanBoogie\Errors();
$form->validate($values, $errors);

echo $form;