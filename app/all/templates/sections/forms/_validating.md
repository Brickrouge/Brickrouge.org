# Validating forms

The `validate()` method is used to validate data provided by the user. Errors are collected in a
`ErrorCollection` instance and the `ERRORS` attribute is updated. When the form is rendered, the
elements states are updated according to these errors.

```php
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$errors = $form->validate($_POST);
}

echo $form;
```

Validating the form is not required to display errors, you can just specify them with the
`ERRORS` attribute.

```php
<?php

$form[Form::ERRORS] = $_SESSION['form_errors'];

echo $form;
```
