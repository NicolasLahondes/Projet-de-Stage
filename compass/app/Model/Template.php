<?php

namespace Compass;

class Template
{

    // Define params for template    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * render
     *
     * @param  mixed $url
     * @param  mixed $parameters
     * @return void
     */
    public function render($url, array $parameters)
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../View");
        $twig = new \Twig\Environment($loader);
        echo $twig->render($url . '.twig', $parameters);
    }
}
