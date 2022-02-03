<?php

namespace Compass\Controller;

use Compass\Template;

class IndexController
{
    /**
     * error
     *
     * @var mixed
     */
    private $error;

    /**
     * __construct
     *
     * @param  mixed $rootlist
     * @param  mixed $error
     * @return void
     */
    public function __construct(array $rootlist, bool $error = false)
    {
        $this->error = $error;
        $this->index($rootlist, $this->error);
    }
    /**
     * index
     *
     * @param  mixed $rootlist
     * @param  mixed $error
     * @return void
     */
    public function index(array $rootlist, $error)
    {
        if ($error == true) {
            $template = new Template();
            $template->render('404', ['namepage' => '404 page not found']);
        } else {
            $template = new Template();
            $template->render($_SERVER['REQUEST_URI'], ['namepage' => trim($_SERVER['REQUEST_URI'], "/")]);
        }
    }
}
