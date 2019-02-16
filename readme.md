# Infinity Call Tracking

A simple app to hit the infinity call tracking api and return/save a json file.
Intended to build the json file once a day via a cronjob.


### Infinity Service

Infinity API docs can be found at [infinity.co/service/api/](https://www.infinity.co/service/api/)


### Tasks

`tasks/run.php` is what the cron job will hit once a day to make the request and save the file.

The cron format will be something like `0 23 * * path/to/infinity/tasks/run.php`

### Tests

`tests/run.php` will run a test and, add a json file witin it's directory, and dump the json output.


### inc

`inc/InfinityRequest.php` - Class that makes the actual api request to infinity and passes in the date range.

`inc/CreateFile.php` - A little create file helper

`inc/FormatJson.php` - A simple pretty printer for json tests.


### Files

`files/tracking.json` is the actual output file. Note that this can be easily changed. See params for `inc/CreateFile.php`
