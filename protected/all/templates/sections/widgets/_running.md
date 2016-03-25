# Running Brickrouge

`Brickrouge.run()` is used to run **Brickrouge**. The DOM is observed for mutations and widgets
found in `document.body` are built.

A nice place to call the method is during _DOM ready_, or as a _DOM ready_ callback:

```js
document.addEventListener('DOMContentLoaded', Brickrouge.run)
```

> The [MutationObserver](https://developer.mozilla.org/en/docs/Web/API/MutationObserver)
interface—or DOM polling if it's not available—is used to automatically build new widgets.
