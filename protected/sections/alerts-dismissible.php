<?php

namespace Brickrouge;

echo new Form([

	Element::CHILDREN => [

		'input0' => new Text([ Group::LABEL => 'Required', 'required' => true ]),
		'input1' => new Text([ Group::LABEL => 'Optional' ])

	],

	Form::ERRORS => [ 'input0' => [ "The field <em>Required</em> is required." ] ],
	Form::RENDERER => Form\GroupRenderer::class

]);
