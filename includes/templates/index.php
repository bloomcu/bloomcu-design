<?php
/**
 * Index
 * Entry point for all templates.
 *
 */

$files = [
    'post-template.php',
];

foreach ( $files as $file ) {
	require_once $file;
}
