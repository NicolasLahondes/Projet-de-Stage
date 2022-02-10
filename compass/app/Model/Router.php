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

        $req = $this->db->get("pages", array('slug'));
        $rootlist = $req;

        // List all pages of the website (Only for debug)
        // foreach ($rootlist as $page) {
        //     echo $page["slug"] . "<br>";
        // }

        // Get all the slugs from db array.
        $sluglist = [];
        foreach ($rootlist as $root) {
            array_push($sluglist, $root["slug"]);
        }

        // Handle if pages exist or not. Redirect either on 404 or on existing page
        if (in_array(trim($_SERVER['REQUEST_URI'], "/"), $sluglist)) {
            new \Compass\Controller\IndexController($this->db, $rootlist);
        } else {
            new \Compass\Controller\IndexController(null, $rootlist, true);
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
