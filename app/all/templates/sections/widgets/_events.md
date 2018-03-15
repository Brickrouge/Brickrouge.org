# Events

## A widget has been built

The `widget` event is fired after a widget has been built.

```js
/**
 * @param {Brickrouge.WidgetEvent} ev
 */
Brickrouge.observeWidget(ev => {

    console.log('A widget has been built:', ev.widget)

})
```

## The DOM was updated

The `update` event is fired after the DOM was updated.

```
/**
 * @param {Brickrouge.UpdateEvent} ev
 */
Brickrouge.observeUpdate(ev => {

    console.log('This fragment updated the DOM:', ev.fragment)
    console.log('These elements are new widgets:', ev.elements)
    console.log('These widgets have been built:', ev.widgets)

})
```

> **Note:** The event is fired a first time after **Brickrouge.js** is ran.

## Brickrouge is running

The `running` event is fired after **Brickrouge** is ran.

```js
/**
 * @param {Brickrouge.RunningEvent} ev
 */
Brickrouge.observeRunning(ev => {

    console.log('Brickrouge is running, we can do stuff')

})
```
