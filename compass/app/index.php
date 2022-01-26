<?php

namespace Compass;

require 'vendor/autoload.php';

// This is a test to display URL parameter thus testing htaccess

$router = new Router($_GET['url']);

// List of existing pages on the website

$rootlist = ['home','discoverpage','profile'];

// Search if requested url exist

foreach ($rootlist as $root) {

// If the pages does exist in $rootlist it will get the controller

    if ($_GET['url'] == $root) {

        $router->home();
    }

// Handle every case where the page does not exist
// Would be better to require a 404 (TODO) 
    else if ($_GET['url'] !== $root){

        echo "<p>this page does not exist</p>";
        break;
    }
}



