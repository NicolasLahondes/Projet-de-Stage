<?php

namespace Compass\Controller;

use Compass\Template;
use Compass\User;

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
    public function __construct(object $db = null, array $rootlist, bool $error = false)
    {
        $this->error = $error;
        $this->user = new User();
        $this->index($db, $rootlist, $this->error);
    }
    /**
     * index
     *
     * @param  mixed $rootlist
     * @param  mixed $error
     * @return void
     */
    public function index($db, array $rootlist, $error)
    {
        // Redicrect on error
        if ($error == true) {
            $template = new Template();
            $template->render('404', ['namepage' => '404 page not found']);
        } else {
            $users = $this->user->getUsers();
            var_dump($users); exit;
            $template = new Template();
            $template->render($_SERVER['REQUEST_URI'], ['pageData' => $pageData]);
        }
    }
}
