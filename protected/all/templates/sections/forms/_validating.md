# Validating forms

The `validate()` method is used to validate data provided by the user. Errors are collected in a
`ErrorCollection` instance and the `ERRORS` attribute is updated. When the form is rendered, the
elements states are updated according to the `ERRORS` attribute.

```php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$errors = $form->validate($_POST);
}

echo $form;
```
