<?php

declare (strict_types = 1);

require __DIR__ . '/vendor/autoload.php';

use FatalErrCatcher\ErrorCatcher;

new ErrorCatcher();

$t = explode('^', $h);