<?php

namespace Brickrouge;

echo new Element
(
	'div', array
	(
		Element::CHILDREN => array
		(
			new Button
			(
				'Primary', array
				(
					'type' => 'submit',
					'class' => 'primary'
				)
			),

			PHP_EOL,

			new Button
			(
				'Info', array
				(
					'class' => 'info'
				)
			),

			PHP_EOL,

			new Button
			(
				'Success', array
				(
					'class' => 'success'
				)
			),

			PHP_EOL,

			new Button
			(
				'Danger', array
				(
					'type' => 'reset',
					'class' => 'danger'
				)
			)
		),

		'class' => 'well'
	)
);
