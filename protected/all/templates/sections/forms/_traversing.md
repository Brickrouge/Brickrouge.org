# Traversing forms

Using a `foreach` construct, forms can be traversed recursively. 

The following example demonstrates how a form can be traversed to display the labels and names of
its elements.

> Although children may be specified as strings, while traversing only instances of `Element` are
returned.

```php
foreach ($form as $element)
{
	echo "{$element[Group::LABEL]} `{$element['name']}`.\n";
}
```
