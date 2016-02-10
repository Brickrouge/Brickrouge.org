<?php

namespace Brickrouge;

$form = new Form([

	Form::VALUES => $_POST,
	Form::RENDERER => Form\GroupRenderer::class,
	Form::ACTIONS => [

		new Button('Save Changes', [

			'type' => 'submit',
			'class' => 'btn-primary'

		]),

		new Button('Cancel', [

			'type' => 'reset'

		])

	],

	Element::GROUPS => [

		'one' => [

			'title' => 'Basics'

		],

		'two' => [

			'title' => 'Required and validated'

		],

		'three' => [

			'title' => 'Example form legend'

		]

	],

	Element::CHILDREN => [

		'input' => new Text([

			Group::LABEL => "Input",
			Element::INLINE_HELP => "With a small snippet of help text",
			Element::GROUP => 'one'

		]),

		'select' => new Element('select', [

			Group::LABEL => 'Select',
			Element::GROUP => 'one',
			Element::OPTIONS => [ 1 => 1, 2, 3, 4, 5 ]

		]),

		new Text([

			Group::LABEL => 'Uneditable Input',
			Element::GROUP => 'one',

			'readonly' => true,
			'value' => 'Some Value Here'

		]),

		'disabledInput' => new Text([

			Group::LABEL => "Disabled Input",
			Element::GROUP => 'one',

			'disabled' => true,
			'placeholder' => "Disabled input here… carry on."

		]),

		'text' => new Element('textarea', [

			Group::LABEL => 'Textarea',
			Element::GROUP => 'one',
			Element::DESCRIPTION => "Block of help text to describe the field above if need be.",

			'rows' => 3,
			'class' => 'span5'

		]),

		'checkbox' => new Element(Element::TYPE_CHECKBOX, [

			Element::LABEL => 'A single checkbox',
			Element::GROUP => 'one'

		]),

		/*
		 * TWO
		 */

		'required' => new Text([

			Group::LABEL => 'Required value',
			Element::GROUP => 'two',
			Element::REQUIRED => true

		]),

		'email' => new Text([

			Group::LABEL => 'Email',
			Element::GROUP => 'two',
			Element::VALIDATOR => [ 'Brickrouge\Form::validate_email' ],
			Element::DEFAULT_VALUE => 'invalid-email'

		]),

		'url' => new Text([

			Group::LABEL => 'URL',
			Element::GROUP => 'two',
			Element::VALIDATOR => [ 'Brickrouge\Form::validate_url' ],
			Element::DEFAULT_VALUE => 'invalid-url'

		]),

		'birthday' => new Text([

			Group::LABEL => 'Date',
			Element::GROUP => 'two',
			Element::VALIDATOR => [ 'Brickrouge\Form::validate_string', [ 'regex' => '#^\d{4}-\d{2}-\d{2}$#' ] ],
			Element::INLINE_HELP => 'YYYY-MM-DD',
			Element::DESCRIPTION => 'We can validate patterns with the <q>string</q> validator.',
			Element::DEFAULT_VALUE => 'invalid-birthday'

		]),

		'length-minmax' => new Text([

			Group::LABEL => 'Length min/max',
			Element::GROUP => 'two',
			Element::VALIDATOR => [ 'Brickrouge\Form::validate_string', [ 'length-min' => 3, 'length-max' => 6 ] ],
			Element::INLINE_HELP => 'Between 3 and 6 characters',
			Element::DESCRIPTION => 'We can also validate the number of characters with the <q>string</q> validator.'

		]),

		/*
		 * THREE
		 */

		'optionsCheckboxes' => new Element(Element::TYPE_CHECKBOX_GROUP, [

			Group::LABEL => 'List of Options',
			Element::DEFAULT_VALUE => [ 'option1' => true, 'option2' => true, 'option3' => true ],
			Element::DESCRIPTION => '<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.',
			Element::GROUP => 'three',
			Element::OPTIONS => [

				'option1' => "Option one is this and that—be sure to include why it’s great",
				'option2' => "Option two can also be checked and included in form results",
				'option3' => "Option three can—yes, you guessed it—also be checked and included in form results",
				'option4' => "Option four cannot be checked as it is disabled."

			],

			Element::OPTIONS_DISABLED => [ 'option4' => true ],

			'class' => 'inputs-list'

		]),

		'disabledOptionsCheckboxes' => new Element(Element::TYPE_CHECKBOX_GROUP, [

			Group::LABEL => 'Disabled List of Options',
			Element::DEFAULT_VALUE => [ 'option1' => true, 'option2' => true, 'option3' => true ],
			Element::DESCRIPTION => 'This group is disabled.',
			Element::GROUP => 'three',
			Element::OPTIONS => [

				'option1' => "Option one is this and that—be sure to include why it’s great",
				'option2' => "Option two can also be checked and included in form results",
				'option3' => "Option three can—yes, you guessed it—also be checked and included in form results",
				'option4' => "Option four cannot be checked as it is disabled."

			],

			Element::OPTIONS_DISABLED => [ 'option4' => true ],

			'class' => 'inputs-list',
			'disabled' => true

		]),

		'optionsRadios' => new Element(Element::TYPE_RADIO_GROUP, [

			Group::LABEL => 'List of Options',
			Element::DEFAULT_VALUE => 'option2',
			Element::GROUP => 'three',
			Element::OPTIONS => [

				'option1' => "Option one is this and that&mdash;be sure to include why it’s great",
				'option2' => "Option two can is something else and selecting it will deselect options 1"

			],

			'class' => 'inputs-list'
		]),

		'disabledOptionsRadios' => new Element(Element::TYPE_RADIO_GROUP, [

			Group::LABEL => 'Disabled List of Options',
			Element::DEFAULT_VALUE => 'option2',
			Element::DESCRIPTION => 'This group is disabled.',
			Element::GROUP => 'three',
			Element::OPTIONS => [

				'option1' => "Option one is this and that&mdash;be sure to include why it’s great",
				'option2' => "Option two can is something else and selecting it will deselect options 1"

			],

			'class' => 'inputs-list',
			'disabled' => true
		])
	],

	'class' => 'form-horizontal'

]);
