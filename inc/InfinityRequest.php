<?php

include 'FormatJson.php';

/**
 * Class to Make Infinity Api Request
 * Dynamic url params are currently only date range.
 */
class InfinityRequest{

  /**
   * Get Data
   * Makes the actual request to Infinity with our creds.
   * Date Range Ends Today, and starts a specified number
   *
   * @param number $numDays - number of days of data to included
   * @return object $formated_result - formated json object of data.
   */
  function data($numDays, $format = 'json') {

    // Dates
    $startDate = $this->startDate($numDays);
    $endDate = $this->endDate();

    // $format
    $returnFormat = $format;

    // Creds
    $username = "your@mom.com";
    $password = "SomePass";

    // Request URL
    $url ="https://api.infinitycloud.com/reports/v2/triggers/calls?igrp=2586&limit=50000&startDate={$startDate}&endDate={$endDate}&sort[]=rowId-desc&format={$returnFormat}&tz=America/Los_Angeles&display[]=igrp&display[]=vid&display[]=triggerDatetime&display[]=dgrp&display[]=dgrpName&display[]=chName&display[]=txr&display[]=goalTitle&display[]=outcomeType&display[]=ringTime&display[]=ivrDuration&display[]=queueDuration&display[]=callDuration&display[]=bridgeDuration&display[]=callStage&display[]=callRating&display[]=operatorRef&display[]=dialplanRef&display[]=ivrRef&display[]=srcPhoneNumber&display[]=destPhoneNumber&display[]=campaign&display[]=adGroup&display[]=term&display[]=ip&display[]=city&display[]=region&display[]=rowId";

    // Make curl request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    $formatted_result = format_json($result);

    curl_close($ch);

    return $formatted_result;
  }

  /**
   * Get End Date
   * Helper to get today's date
   */
  function endDate() {
    $todaysDate = date("Y-m-d");

    return $todaysDate;
  }

  /**
   * Get Start Date
   * Helper to get starting date as number of
   * days before today.
   * @param date as yyyy-mm-dd
   */
  function startDate($days) {
    $daysBefore = date( 'Y-m-d', strtotime("-$days days"));

    return $daysBefore;
  }
}
