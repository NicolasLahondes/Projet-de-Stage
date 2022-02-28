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
    public function __construct(object $db = null, array $rootlist, string $class = null, string $method = null, bool $error = false)
    {
        $this->error = $error;
        $this->method = $method;
        if ($class) {
            // Generate class dynamically
            $this->classlist = "Compass" . "\\" . $class;
            // Register class inside a var so we can call method dynamically
            $this->class = new $this->classlist;
        }
        $this->index($db, $rootlist, $this->error, $class);
    }
    /**
     * index
     *
     * @param  mixed $rootlist
     * @param  mixed $error
     * @return void
     */
    public function index($db, array $rootlist, $error, $class)
    {
        // Redicrect on error
        if ($error == true) {
            $template = new Template();
            $template->render('404', ['namepage' => '404 page not found']);
        } else {
            
            // Retrieve all methods from the loaded class
            $methods = get_class_methods($this->classlist);
            // Force retrieved method to be a string

            // print_r($methods);
            // Retrieve list methods except for construct and getters and setters.
            foreach ($methods as $method) {
                if (!str_starts_with($method, "get") && !str_starts_with($method, "set") && !str_starts_with($method, "_")) {
                    $retrievedMethods = [];
                    array_push($retrievedMethods, $method);
                }
            }
            // Check if retrieved method exist in class
            foreach ($retrievedMethods as $method) {
                if (in_array($this->method, $retrievedMethods)) {
                    $maMethod = (string)$this->method;
                    $data = $this->class->$maMethod();
                    $template = new Template();
                    $template->render(strtolower($class), ['pageData' => $data]);
                } else {
                    $template = new Template();
                    $template->render('404', ['namepage' => '404 page not found']);
                }
            }
        }
    }
}
