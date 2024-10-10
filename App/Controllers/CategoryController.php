<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
    public function index(){
        $data = Category::SelectAll(0);
        return view("category/categoryView", "Категория", $data, "main.php");
    }

    public function createView()
    {
        return view("category/categoryAddView", "Добавить Категории", '',  "main.php");
    }

    public function create()
    {
        if (isset($_POST['Add'])) {
            if (!empty($_POST['CategoryName'])) {

                $name = htmlspecialchars(strip_tags($_POST['CategoryName']));
                
                $data =
                    [
                        'name' => $name
                    ];

                Category::Create($data);
                header("location: /Category");
            }
        }
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            if (!empty($_POST['deletedId'])) {
                Category::Delete($_POST['deletedId']);
                header('location: /Category');
            }
        }
    }

    public function update()
    {
        if (isset($_POST['Update'])) {
            if (!empty($_POST['UpId']) && !empty($_POST['name'])) {

                $name = htmlspecialchars(strip_tags($_POST['name']));

                $data =
                    [
                        'name' => $name
                    ];


                Category::Update($_POST['UpId'], $data);
                header("location: /Category");
            }
        }
    }

    public function read()
    {
        if(isset($_POST["Read"])){
            $id = $_POST["ReadId"];
            $content = Category::Show($id);
            return view("category/categoryReadView","Подробности", $content, "main.php");
        }
        else{
            echo "Упс... Произошло какая-то ошибка!";
            ?> <a href="/">Назад</a> <?php
        }
        
    }

    public function deleteAll(){
        Category::DeleteAll();
        header("location: /Category");
    }
}
?>