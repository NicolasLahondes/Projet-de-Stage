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
        $sluglist = [];

        foreach ($rootlist as $root) {
            array_push($sluglist, $root["slug"]);
        }

        if (in_array(trim($_SERVER['REQUEST_URI'], "/"), $sluglist)) {
            // echo "y";
            // echo "<br>";
            // echo $_SERVER['REQUEST_URI'];
            new \Compass\Controller\IndexController($rootlist);
        } else {
            // echo "n";
            // echo "<br>";
            // echo $_SERVER['REQUEST_URI'];
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
