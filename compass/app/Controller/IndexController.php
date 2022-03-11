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
     * @param  mixed $class
     * @param  mixed $method
     * @param  mixed $error
     * @return void
     */
    public function __construct(string $class = null, string $method = null, bool $error = false)
    {
        $this->error = $error;
        $this->method = $method;
        if ($class)
        {
            // Generate class dynamically
            $this->generateClass = "Compass" . "\\" . $class;
            // Register class inside a var so we can call method dynamically
            if (class_exists($this->generateClass))
            {
                $this->class = new $this->generateClass;
            }
        }
        $this->index($this->error, $class);
    }

    /**
     * index
     *
     * @param  mixed $rootlist
     * @param  mixed $error
     * @return void
     */
    public function index($error, $class)
    {
        // Redirect on error
        if ($error == true || !class_exists($this->generateClass))
        {
            $template = new Template();
            $template->render('404', ['namepage' => '404 page not found']);
        }
        else
        {
            // Retrieve all methods from the loaded class
            $methods = get_class_methods($this->class);

            // Retrieve list methods except for construct and getters and setters.
            $retrievedMethods = [];

            foreach ($methods as $method)
            {
                if (!str_starts_with($method, "get") && !str_starts_with($method, "set") && !str_starts_with($method, "_"))
                {
                    array_push($retrievedMethods, $method);
                }
            }


            // Check if retrieved method exist in class and display page


            if (in_array(lcfirst($this->method), $retrievedMethods))
            {

                $myMethod = (string)$this->method;
                $firstSlugName = strtolower(str_replace("Compass\\", "", get_class($this->class)));

                if ($firstSlugName != "api")
                {
                    $template = new Template();
                    $data = $this->class->$myMethod();
                    $template->render(strtolower($class), ['pageData' => $data]);
                }
                else
                {
                    $this->class->$myMethod();
                }
            }
            else
            {
                $template = new Template();
                $template->render('404', ['namepage' => '404 page not found']);
            }
        }
    }
}
