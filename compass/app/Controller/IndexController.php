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
        $this->oui = ucfirst(trim($_SERVER['REQUEST_URI'], "/"));
        $this->classlist = "Compass" . "\\" . "User";
        var_dump($this->classlist);
        $this->methodlist = 'getUsers';
        $this->error = $error;
        $this->class = new $this->classlist;
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
            $users = $this->class->getUsers();
            echo "<br>";
            var_dump($this->oui);
            $template = new Template();
            $template->render($_SERVER['REQUEST_URI'], ['pageData' => $users]);
        }
    }
}
