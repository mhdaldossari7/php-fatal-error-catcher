<?php

declare (strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use FatalErrCatcher\ErrorCatcher; // import class

$slackWebhookURL = "https://xxxxx"; // define slack url if you want to get notification in slack

new ErrorCatcher($slackWebhookURL); // initialize object ($slackWebhookURL is optional argument, if you didn't provide slack_url the error message will be print in console)

$t = explode('^', $h); // will produce fatal error (for testing)