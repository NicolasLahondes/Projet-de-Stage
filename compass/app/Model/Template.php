<?php

namespace Compass;

class Template {

    // Define params for template
    public function __construct()
    {

    }

    public function render () { 
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../View");
        $twig = new \Twig\Environment($loader);
        echo $twig->render($_GET['url'] . '.twig', ['namepage' => $_GET['url']]);
    }

}