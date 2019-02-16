<?php

/**
 * Create File
 * Little helper function to create a json file from our data.
 *
 * @param object $data - data source
 * @param string $fileName - filename
 */
function create_file($data, $file = "../files/tracking.json") {
  $fp = fopen( $file, 'w' );
  fwrite( $fp, $data );
  fclose( $fp );
}
