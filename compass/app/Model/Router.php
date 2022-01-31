<?php

namespace Compass;

// Router allows to redirect to correct controllers.

class Router
{
    // Define params for rooter
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    // Load Controller
    public function run(array $rootlist)
    {
        if (in_array($_GET['url'], $rootlist)) {
            new \Compass\Controller\IndexController($rootlist);
        } else {
            echo '404';
        }
    }

    // Get the current url
    public function getcurrenturl()
    {
        return $this->url;
    }

    // Show the current url
    public function show()
    {
        echo $this->url;
    }
}
