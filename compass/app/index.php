<?php

namespace Compass;

require 'vendor/autoload.php';

// This is a test to display URL parameter thus testing htaccess
$router = new Router($_SERVER['REQUEST_URI']);


// List of existing pages on the website

$rootlist = array(
    "home" => array('slug' => 'home', 'name' => "Home"),
    "discover" => array('slug' => 'discover', 'name' => "Discover"),
    "profile" => array('slug' => 'profile', 'name' => "Profile"),
    "contact" => array('slug' => 'contact', 'name' => "Contact"),
    "register" => array('slug' => 'register', 'name' => "Register"),
    "admin" => array('slug' => 'admin', 'name' => "Admin")
);
// Search if requested url exist
$router->run($rootlist);
