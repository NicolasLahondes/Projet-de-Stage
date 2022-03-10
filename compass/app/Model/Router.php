<?php

namespace Compass;

use Compass\Database as CompassDatabase;

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
        $this->db = new CompassDatabase();
    }

    // Load Controller    


    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        // Connexion to DB and fetch rootlist of all pages of the website

        // Get url info (class and method)
        // Get full url and separate args for class and method
        $url = trim($_SERVER['REQUEST_URI'], "/");
        $urlcut = explode("/", $url);

        // Check if there is a method
        $class = ucfirst($urlcut[0]);
        if (isset($urlcut[1])) {
            $method = $urlcut[1];
        }
        // Get all slugs from DB
        $rootlist = $this->db->get("pages", array('slug'));
        $sluglist = [];

        foreach ($rootlist as $root) {
            array_push($sluglist, $root->slug);
        }

        // Handle if pages exist or not. Redirect either on 404 or on existing page
        if (in_array(strtolower($class), $sluglist)) {
            if (isset($method)) {
                // Handle if page and method does exist
                new \Compass\Controller\IndexController($class, $method);
            } else {
                // Handle if no method correspond to class method
                new \Compass\Controller\IndexController(null, null, true);
            }
        } else {
            // Handle if the class does not correspond to any slug
            new \Compass\Controller\IndexController(null, null, true);
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
