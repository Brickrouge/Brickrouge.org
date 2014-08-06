<?php

namespace Brickrouge;

$errors = new \ICanBoogie\Errors();
$errors['username'] = 'Unknown username/password combination.';
$errors['username'] = 'Funny username by the way ;-)';
$errors[] = 'Login failed!';

echo new Alert($errors);
