<?php

namespace Brickrouge;

echo new Form(array(

	Form::ACTIONS => array
	(
		new Button('Save changes', array('type' => 'submit', 'class' => 'btn-primary')),
		new Button('Cancel', array('type' => 'reset'))
	),

	Element::CHILDREN => array(new Group(array(

		Element::LEGEND => "Form control states",
		Element::CHILDREN => array
		(
			'focusedInput' => new Text
			(
				array
				(
					Form::LABEL => "Focused input",
					'class' => 'input-xlarge focused',
					'value' => "This is focused..."
				)
			),

			'disabledInput' => new Text
			(
				array
				(
					Form::LABEL => "Disabled input",
					'class' => 'input-xlarge disabled',
					'disabled' => true,
					'placeholder' => "Disabled input here..."
				)
			),

			'optionsCheckbox' => new Element
			(
				Element::TYPE_CHECKBOX, array
				(
					Form::LABEL => "Disabled checkbox",
					Element::LABEL => "This is a disabled checkbox",
					'disabled' => true
				)
			),

			'inputWarning' => new Text
			(
				array
				(
					Form::LABEL => "Input with warning",
					Element::INLINE_HELP => "Something may have gone wrong",
					Element::STATE => 'warning'
				)
			),

			'inputError' => new Text
			(
				array
				(
					Form::LABEL => "Input with error",
					Element::INLINE_HELP => "Please correct the error",
					Element::STATE => 'error'
				)
			),

			'inputSuccess' => new Text
			(
				array
				(
					Form::LABEL => "Input with success",
					Element::INLINE_HELP => "Woohoo!",
					Element::STATE => 'success'
				)
			),

			'selectSuccess' => new Element
			(
				'select', array
				(
					Form::LABEL => "Input with success",
					Element::INLINE_HELP => "Woohoo!",
					Element::STATE => 'success',
					Element::OPTIONS => array(1 => 1, 2, 3, 4, 5)
				)
			)
		)
	))),

	'class' => 'form-horizontal'
));