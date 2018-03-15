# Helpers

- `Brickrouge.isWidget()`: Whether the element is a widget.

	```js
	var element = document.getElementById('my-element')
	
	if (Brickrouge.isWidget(element)
	{
		console.log('is an widget')
	}
	else
	{
		console.log('is not a widget')
	}
	```

- `Brickrouge.isBuilt()`: Whether the widget for this element is built.

	```js
	var element = document.getElementById('my-element')
	
	if (Brickrouge.isBuilt(element)
	{
		console.log('widget is built')
	}
	else
	{
		console.log('widget is not built, also might not be a widget')
	}
	```

- `Brickrouge.uidOf()`: Returns the unique identifier associated with an element. If the
`uniqueNumber` property is available it will return it, otherwise it creates a unique identifier of
its own.

	```js
	var element = document.getElementById('my-element')

	console.log('uid:', Brickrouge.uidOf(element))
	```

- `Brickrouge.empty()`: Removes the children of an element.

	```js
	var element = document.getElementById('my-element')
	
	Brickrouge.empty(element)
	```

- `Brickrouge.clone()`: Clone a custom element, taking care of removing sensitive attributes.

	```js
	var element = document.getElementById('my-element')
	var clone = Brickrouge.clone(element)
	```

- `Brickrouge.Dataset.from()`: Returns the dataset values associated with an element.

	```js
	var element = document.getElementById('my-element')
	var dataset = Brickrouge.Dataset.from(element)
	```

- `Brickrouge.Widget.from()` or `Brickrouge.from()`: Returns the widget associated with an element
and creates it if needed.

	```js
	var element = document.getElementById('my-element')
	
	try
	{
		var widget = Brickrouge.from(element) 
	}
	catch (e)
	{
		console.log('probably not a widget')
	}
	```
