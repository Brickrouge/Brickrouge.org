<?php

namespace Brickrouge;

echo new Form(array(

	Form::ACTIONS => array
	(
		new Button('Save changes', array('type' => 'submit', 'class' => 'btn-primary')),
		new Button('Cancel', array('type' => 'reset'))
	),

	Element::CHILDREN => array(new Group(array(

		Element::LEGEND => "Controls Bootstrap supports",
		Element::CHILDREN => array
		(
			'input01' => new Text
			(
				array
				(
					Form::LABEL => "Text input",
					Element::DESCRIPTION => "In addition to freeform text, any HTML5 text-based input appears like so.",

					'class' => 'xlarge'
				)
			),

			'optionsCheckbox' => new Element
			(
				Element::TYPE_CHECKBOX, array
				(
					Form::LABEL => "Checkbox",
					Element::LABEL => "Option one is this and that&mdash;be sure to include why it’s great"
				)
			),

			'select01' => new Element
			(
				'select', array
				(
					Form::LABEL => "Select list",
					Element::OPTIONS => array_combine(range(1, 5), range(1, 5))
				)
			),

			'multiSelect' => new Element
			(
				'select', array
				(
					Form::LABEL => "Multi-select",
					Element::OPTIONS => array_combine(range(1, 5), range(1, 5)),

					'multiple' => true
				)
			),

			'fileInput' => new Element
			(
				'input', array
				(
					Form::LABEL => "File input",

					'type' => 'file',
					'class' => 'input-file'
				)
			),

			'textarea' => new Element
			(
				'textarea', array
				(
					Form::LABEL => "Textarea",

					'rows' => 3,
					'class' => 'input-xlarge'
				)
			)
		)))
	),

	'class' => 'form-horizontal'
));