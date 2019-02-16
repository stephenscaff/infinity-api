<?php

# Main Task for the cron job
$base = dirname(dirname(__FILE__));

include_once $base . '/inc/InfinityRequest.php';
include_once $base . '/inc/CreateFile.php';

# Settings
$numberOfDays = 1;
$format = "json";
$filePath = $base . "/files/tracking.${format}";

# Connection
$connector = new InfinityRequest();
$data = $connector->data($numberOfDays, $format);

# Create our file
create_file($data, $filePath);
