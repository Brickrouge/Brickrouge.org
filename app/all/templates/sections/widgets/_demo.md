# A simple custom-element demo

Widgets are created from existing HTML and CSS, they just come to life by the grace of
[Brickrouge.js][]. Widgets can be embedded by other widgets. The following example demonstrates how
a _copy_ widget can embed a _time_ widget. When the "Copy" button is pressed the _copy_ widget
creates a copy of its element and insert it before itself, [Brickrouge.js][] takes care of building
widgets when the DOM is mutated, the rest is up to you.

The special attribute `brickrouge-is` is used to recognize widgets from classic HTML elements, it
defines the name of the widget factory.

By the way, [Brickrouge.js][] is framework agnostic, only weights 4ko, and includes some nice
utilities such as observers.

[Brickrouge.js]: https://github.com/Brickrouge/Brickrouge.js
