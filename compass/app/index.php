<?php

namespace Compass;

require 'vendor/autoload.php';

// This is a test to display URL parameter thus testing htaccess
$router = new Router($_GET['url']);

// List of existing pages on the website
$rootlist = ['home','discoverpage','profile','contact'];

// Search if requested url exist

foreach ($rootlist as $root) {

    // If the pages does exist in $rootlist it will get the controller.
    if ($router->getcurrenturl() == $root) {
        $router->run();
    }

}

// Handle every case where the page does not exist (TODO) 



