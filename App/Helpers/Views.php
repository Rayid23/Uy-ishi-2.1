<?php

namespace App\Helpers;

class Views
{
    public static function make($view, $title, $models = [], $path)
    {

        if ($path != "LoginAndRegis\main.php") {
            if (!isset($_SESSION['UserName'])) {
                header('location: /');
                exit();
            } else {
                ob_start();
                include dirname(__DIR__) . "/Views/" . $view . '.php';
                $content = ob_get_clean();
                include dirname(__DIR__) . '/Views/' . $path;
            }
        } else {
            ob_start();
            include dirname(__DIR__) . "/Views/" . $view . '.php';
            $content = ob_get_clean();
            include dirname(__DIR__) . '/Views/' . $path;
        }
    }
}
