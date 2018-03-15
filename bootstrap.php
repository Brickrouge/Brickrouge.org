<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie;

define('App\ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('Brickrouge\ACCESSIBLE_ASSETS', __DIR__ . '/web/assets/managed');

require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/../vendor/icanboogie-combined.php'))
{
	require __DIR__ . '/vendor/icanboogie-combined.php';
}

return boot();
