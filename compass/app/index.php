<?php

namespace Compass;

require 'vendor/autoload.php';

// This is a test to display URL parameter thus testing htaccess
$router = new Router($_GET['url']);

// List of existing pages on the website
$rootlist = ['home','discover','profile','contact','register','admin'];
// Search if requested url exist
$router->run($rootlist); 

    


// Handle every case where the page does not exist (TODO) 



