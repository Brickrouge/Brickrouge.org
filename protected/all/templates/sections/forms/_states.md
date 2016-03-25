## Validation states

The validation state of elements is defined by the `STATE` attribute, which is updated when their
form is validated. Although form validation only uses `STATE_DANGER` for elements failing to
validate, the following values are also available: `STATE_SUCCESS`, and `STATE_WARNING`. Of course,
`null` clears the state.

```php
<?php

namespace Brickrouge;

echo new Text([

	Group::LABEL => "Input with warning",
	Element::INLINE_HELP => "Something may have gone wrong",
	Element::STATE => Element::STATE_WARNING

]);
```
