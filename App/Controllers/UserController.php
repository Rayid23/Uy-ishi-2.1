<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function login()
    {
        return view("LoginAndRegis\Login", "Логин", '', 'LoginAndRegis\main.php');
    }
    public function logout() {
        session_destroy();
        header('location: /');
    }

    public function register()
    {
        return view("LoginAndRegis\Register", "Логин", '', 'LoginAndRegis\main.php');
    }

    public function create()
    {
        if (isset($_POST['newUser'])) {
            if (!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password'])) {
                $name = $_POST['name'];
                $login = $_POST['login'];
                $password = md5($_POST['password']);

                $data =
                    [
                        'name' => $name,
                        'login' => $login,
                        'password' => $password
                    ];

                $_SESSION['UserName'] = $name;
                User::Create($data);
                header("location: /Product");
            }
        }
    }

    public function check()
    {
        if (isset($_POST["checkUser"])) {
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = $_POST['login'];
                $password = md5($_POST['password']);

                $user = User::WhereCol2('login', '=', $login, 'password', '=', $password);

                if (count($user) == 1) {
                    $_SESSION['UserName'] = $user[0]->name;
                    header("location: /Product"); #Доступ разрещен
                }
                else{
                    header('location: /'); #Обратно в Логин
                }
            }
        }
    }
}
