<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

use Bosqu\ProjetLinksHandler\Controller\HomeController;

require '../vendor/autoload.php';

session_start();


if(isset($_GET['controller'])) {
    $controller = ucfirst(filter_var($_GET['controller'], FILTER_SANITIZE_STRING)) . "Controller";
    $controller = "Bosqu\\ProjetLinksHandler\\Controller\\" . $controller;

    if(class_exists($controller)) {
        $controller = new $controller();

        if(isset($_GET['action'])) {
            $action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);

            try {
                $reflexion =  new ReflectionClass($controller);

                if($reflexion->hasMethod($action)) {
                    $controller->$action();
                }
                else {
                    $controller->home();
                }
            }
            catch (ReflectionException $e) {
                echo $e->getMessage();
            };
        }
        else {
            (new $controller)->home();
        }
    }
    else {
        (new HomeController)->home();
    }
}
else {
    (new HomeController)->home();
}