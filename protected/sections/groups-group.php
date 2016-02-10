<?php

namespace Brickrouge;

echo new Group([

	Element::LEGEND => "What's your name ?",
	Element::CHILDREN => [

		'lastname' => new Text([

			Group::LABEL => "Last name",
			Element::WEIGHT => 1,
			'type' => 'text',
			'value' => "Laviale"

		]),

		'firstname' => new Text([

			Group::LABEL => "First name",
			'type' => 'text',
			'value' => "Olivier"

		]),

		'salutation' => new Element(Element::TYPE_RADIO_GROUP, [

			Group::LABEL => "Salutation",
			Element::WEIGHT => Element::WEIGHT_BEFORE_PREFIX . 'firstname',
			Element::OPTIONS => [

				1 => "Misses",
				2 => "Mister"

			],

			'class' => 'inline-inputs',
			'value' => 2

		])

	]

]);

