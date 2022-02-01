<?php

namespace Compass;

// Router allows to redirect to correct controllers.

class Router
{
    // Define params for rooter    
    /**
     * __construct
     *
     * @param  mixed $url
     * @return void
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    // Load Controller    

    /**
     * run
     *
     * @param  mixed $rootlist
     * @return void
     */
    public function run(array $rootlist)
    {
        if (in_array($_GET['url'], $rootlist)) {
            new \Compass\Controller\IndexController($rootlist);
        } else {
            new \Compass\Controller\IndexController($rootlist, true);
        }
    }

    // Get the current url    
    /**
     * getcurrenturl
     *
     * @return void
     */
    public function getcurrenturl()
    {
        return $this->url;
    }

    // Show the current url    
    /**
     * show
     *
     * @return void
     */
    public function show()
    {
        echo $this->url;
    }
}
