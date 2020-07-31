<?php
require './vendor/autoload.php';

use Sunriseqf\JunitLaravel\Http\Controllers\JunitController;

$t = new JunitController();
echo $t->test();