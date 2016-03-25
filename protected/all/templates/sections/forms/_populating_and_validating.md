# Populating and validating forms

Provide an array of values with the `Form::VALUES` attribute and your form gets automatically
populated, even with nested elements. The `VALIDATION` attribute specifies validation rules for your
elements and the `validate()` method validates data provided by a user, and updates the `ERRORS`
attribute.

```php
<?php

use Brickrouge\Form;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$form[Form::VALUES] = $_POST;
	$errors = $form->validate();
}

echo $form;
```

The following example demonstrates how a form can be created and validated with
[ICanBoogie/Validate][], using the [Brickrouge/bind-icanboogie-validate][] package. An initial array
or values is used to populate the form and showcase validation. A dismissible alert should be
displayed with the validation errors, invalid elements should be highlighted.


[ICanBoogie/Validate]:                 https://github.com/ICanBoogie/Validate/
[Brickrouge/bind-icanboogie-validate]: https://github.com/Brickrouge/bind-icanboogie-validate
