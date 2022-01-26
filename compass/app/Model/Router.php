<?php

namespace Compass;

// Router allows to redirect to correct controllers.

class Router
{
    // Define params for rooter
    public function __construct($url) {
        $this->url = $url;
    }

    // Load Controller
    public function run() { 
        require_once 'Controller/IndexController.php';
    }

    // Get the current url
    public function getcurrenturl() {
        return $this->url;
    }

    // Show the current url
    public function show() {
        echo $this->url;
    }

}