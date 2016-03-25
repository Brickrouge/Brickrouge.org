# Events

## A widget has been built

The `widget` event is fired after a widget has been built.

```js
Brickrouge.observe('widget', function(widget) {

    console.log('A widget has been built:', widget)

})
```

## The DOM was updated

The `update` event is fired after the DOM was updated.

```
Brickrouge.observe('update', function(fragment, elements, widgets) {

    console.log('This fragment updated the DOM:', fragment)
    console.log('These elements are new widgets:', elements)
    console.log('These widgets have been built:', widgets)

})
```

> **Note:** The event is fired a first time after **Brickrouge.js** is ran.

## Brickrouge is running

The `running` event is fired after **Brickrouge** is ran.

```js
Brickrouge.observe('running', function() {

    console.log('Brickrouge is running, we can do stuff')

})
```
