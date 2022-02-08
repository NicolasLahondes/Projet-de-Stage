<?php

namespace Compass;

require 'vendor/autoload.php';

// This is a test to display URL parameter thus testing htaccess


$router = new Router($_SERVER['REQUEST_URI']);

// This query works
// $add = $db->getPDO()->query("INSERT INTO `pages` (`title`,`slug`,`path`) VALUES ('Jigot','Jigot','Jigot')");


// List of existing pages on the website

// Search if requested url exist
$router->run();
