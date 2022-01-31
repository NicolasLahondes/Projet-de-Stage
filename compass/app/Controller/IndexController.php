<?php

namespace Compass\Controller;

use Compass\Template;

class IndexController
{

    public function __construct(array $rootlist)
    {
        $this->index($rootlist);
    }
    public function index(array $rootlist)
    {
        // $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../View");
        // $twig = new \Twig\Environment($loader);
        // echo $twig->render($_GET['url'] . '.twig', ['namepage' => $_GET['url']]);
        $template = new Template();
        $template->render();
        

    }
}

// If the pages does exist in $rootlist it will get the controller.
