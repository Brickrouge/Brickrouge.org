<?php

namespace Brickrouge;

echo new Form(array(

	Element::CHILDREN => array
	(
		new Text(array(Element::LABEL => "Label name", Element::LABEL_POSITION => 'above', 'class' => "span3", 'placeholder' => "Type something...")),
		new Element(Element::TYPE_CHECKBOX, array(Element::LABEL => "Check me out")),
		new Button("Submit", array('type' => 'submit'))
	),

	'class' => "well"
));
