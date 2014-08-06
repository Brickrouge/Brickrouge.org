<?php

namespace Brickrouge;

echo new Form(array(

	Form::ACTIONS => array(

		new Button('Save changes', array('type' => 'submit', 'class' => 'btn-primary')),
		new Button('Cancel', array('type' => 'reset'))
	),

	Element::CHILDREN => array(new Group(array(

		Element::LEGEND => "Extending form controls",
		Element::CHILDREN => array(

			new Element('div', array(

				Form::LABEL => "Form sizes",
				Element::CHILDREN => array(

					new Text(array('placeholder' => ".span2", 'class' => 'span2')),
					new Text(array('placeholder' => ".span3", 'class' => 'span3')),
					new Text(array('placeholder' => ".span4", 'class' => 'span4'))
				),
				Element::DESCRIPTION => "Use the same <code>.span*</code> classes from the grid system for input sizes.",
				'class' => 'docs-input-sizes'
			)),

			'prependedInput' => new Text(array(

				Form::LABEL => "Prepended text",
				Text::ADDON => "@",
				Text::ADDON_POSITION => 'before',
				Element::DESCRIPTION => "Here's some help text",
				'size' => 16
			)),

			'appendedInput' => new Text(array(

				Form::LABEL => "Appended text",
				Text::ADDON => "€",
				Text::ADDON_POSITION => 'after',
				Element::DESCRIPTION => "Here's some help text",
				'size' => 16
			)),


			'inlineCheckbox1' => new Element(Element::TYPE_CHECKBOX_GROUP, array(

				Form::LABEL => "Inline checkboxes",
				Element::OPTIONS => array_combine(range(1, 3), range(1, 3)),

				'class' => 'inline-inputs'
			)),

			'optionsCheckboxes' => new Element(Element::TYPE_CHECKBOX_GROUP, array(

				Form::LABEL => "Checkboxes",
				Element::OPTIONS => array(
					'option1' => "Option one is this and that&mdash;be sure to include why it’s great",
					'option2' => "Option two can also be checked and included in form results",
					'option3' => "Option three can&mdash;yes, you guessed it&mdash;also be checked and included in form results"
				),
				Element::DESCRIPTION => "<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form."
			)),

			'optionsRadios' => new Element(Element::TYPE_RADIO_GROUP, array(

				Form::LABEL => "Radio buttons",
				Element::OPTIONS => array(
					'option1' => "Option one is this and that&mdash;be sure to include why it’s great",
					'option2' => "Option two can is something else and selecting it will deselect option one"
				),

				'value' => 'option1'
			))

		)
	))),

	'class' => 'form-horizontal'
));