# PHP Fatal Error Catcher

To catch fatal errors and notify in slack.

## Installation

---

You can install **php-fatal-err-catcher** via composer or by downloading the source.

### Via Composer:

**php-fatal-err-catcher** is available on Packagist as the
[`mhdaldossari7/php-fatal-err-catcher`](https://packagist.org/packages/mhdaldossari7/php-fatal-err-catcher) package:

```
composer require mhdaldossari7/php-fatal-err-catcher
```

## Usage

---

```php
<?php

declare (strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use FatalErrCatcher\ErrorCatcher; // import class

$slackWebhookURL = "https://xxxxx"; // define slack url if you want to get notification in slack

new ErrorCatcher($slackWebhookURL); // initialize object ($slackWebhookURL is optional argument)


// (IMPORTANT NOTE) : You must create ErrorCatcher object at the beginning of your script, so it detects the incoming errors.
```
