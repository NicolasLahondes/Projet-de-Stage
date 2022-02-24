<?php

namespace Compass;

require 'vendor/autoload.php';

// Launch Router with the $_SERVER['REQUEST_URI'] as parameter. 
$router = new Router($_SERVER['REQUEST_URI']);

// Search if requested url exist
$router->run();
