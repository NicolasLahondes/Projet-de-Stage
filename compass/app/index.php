<?php

namespace Compass;

use Compass\Database as CompassDatabase;

require 'vendor/autoload.php';

// This is a test to display URL parameter thus testing htaccess
$router = new Router($_SERVER['REQUEST_URI']);

$db = new CompassDatabase('mariadb', 'database', 'user', 'zeus');

$req = $db->getPDO()->query("SELECT * FROM pages");

$pages = $req->fetchall();



// List of existing pages on the website

// Search if requested url exist
$router->run($pages);
