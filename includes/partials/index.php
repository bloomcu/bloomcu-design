<?php
/**
 * Index
 * Entry point for all partials.
 *
 */

$files = [
    'part.php',
];

foreach ( $files as $file ) {
	require_once $file;
}
