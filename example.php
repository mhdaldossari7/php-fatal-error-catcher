<?php

declare (strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use FatalErrCatcher\ErrorCatcher; // import class

$slackWebhookURL = "https://xxxxx"; // define slack url if you want to get notification in slack

new ErrorCatcher($slackWebhookURL); // initialize object ($slackWebhookURL is optional argument)

$t = explode('^', $h); // will produce fatal error (for testing)