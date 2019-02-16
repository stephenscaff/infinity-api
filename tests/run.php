<?php
/**
 * Run task, dumped to test json response
 */
$base = dirname(dirname(__FILE__));

include_once $base . '/inc/InfinityRequest.php';
include_once $base . '/inc/CreateFile.php';

# Settings
$numberOfDays = 1;
$format = "json";
$filePath = $base . "/tests/tracking.${format}";

# Connection
$connector = new InfinityRequest();
$data = $connector->data($numberOfDays, $format);

# Show me test
var_dump($data);

# Create our file
create_file($data, $filePath);
