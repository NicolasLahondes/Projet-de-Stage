<?php

namespace Compass;

// Router allows to redirect to correct controllers.

class Router
{

    public function __construct($url) {
        $this->url = $url;
    }

    public function home() { 
     
        require_once 'Controller/IndexController.php';
    }

    public function discoverpage() { 
     
    }

}