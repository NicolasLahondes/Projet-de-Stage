<?php

namespace Compass;

class Template
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../View");
        $this->twig = new \Twig\Environment($this->loader);
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
        echo $this->twig->render($url . '.twig', $parameters);
    }
}
