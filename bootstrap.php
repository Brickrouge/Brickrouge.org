<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use function ICanBoogie\boot;

const ROOT = __DIR__ . '/';

define('Brickrouge\ACCESSIBLE_ASSETS', __DIR__ . '/web/assets/managed');

require __DIR__ . '/vendor/autoload.php';

return boot();
