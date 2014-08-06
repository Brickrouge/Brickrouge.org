<?php

foreach ($form as $element)
{
	echo ' ' . ($element['name'] ?: '<em>a nameless element</em>');
}