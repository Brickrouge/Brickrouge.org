# Using your favorite validation engine
	
Forms can be validated with your favorite validation engine. Forms get the validation engine through
their `VALIDATOR` attribute or their `validator` getter. To provide your own validation engine you
have three options: use the `VALIDATOR` attribute; extend the class and define a `validator` getter;
or define a `validator` getter using prototype bindings.

The `FormValidator` class should be of great help creating your own validator.

## … using the `VALIDATOR` attribute

```php
<?php

use Brickrouge\Form;
use Brickrouge\Validate\ErrorCollection;
use Brickrouge\Validate\FormValidator;

class ValidateValues implements FormValidator\ValidateValues
{
	public function __invoke(array $values, array $rules, ErrorCollection $errors)
	{
		// …
	}
}

$validator = new FormValidator($this, new ValidateValues)

$form = new Form([

	Form::VALIDATOR => $validator,
	…

]);
```

## … using inheritance

```php
<?php

use Brickrouge\Form;
use Brickrouge\Validate\FormValidator;

class MyForm extends Form
{
	protected function lazy_get_validator()
	{
		return new FormValidator($this, new ValidateValues);
	}
}
```

## … using prototype bindings

```php
<?php

use Brickrouge\Form;
use Brickrouge\Validate\FormValidator;
use ICanBoogie\Prototype;

Prototype::from(Form::class)['lazy_get_validator'] = function(Form $form) {

	return new FormValidator($form, new ValidateValues);

};
```

Because prototype bindings apply to a class, and its subclass, you can provide different
bindings for different class hierarchy. Refer to the [Prototype documentation][] to learn more
about that.

[Prototype documentation]: https://github.com/ICanBoogie/Prototype#defining-prototypes-methods
