<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        $content = Product::SelectAll(0);
        return view("product/productView", "Продукты", $content, "main.php");
    }

    public function createView()
    {
        return view("product/productAddView", "Добавить Продукта", '', "main.php");
    }

    public function read()
    {
        if(isset($_POST["Read"])){
            $id = $_POST["ReadId"];
            $content = Product::Show($id);
            return view("product/productReadView","Подробности", $content, "main.php");
        }
        else{
            echo "Упс... Произошло какая-то ошибка!";
            ?> <a href="/Product">Назад</a> <?php
        }
        
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            if (!empty($_POST['deletedId'])) {
                Product::Delete($_POST['deletedId']);
                header('location: /Product');
            }
        }
    }

    public function update()
    {
        if (isset($_POST['Update'])) {
            if (!empty($_POST['UpId']) && !empty($_POST['name'])) {

                $name = htmlspecialchars(strip_tags($_POST['name']));

                if (!empty($_FILES['image']['name'])) {
                    $image = $_FILES['image']['name'];
                    $NewImagePath = 'image/' . $image;

                    move_uploaded_file($_FILES['image']['tmp_name'], $NewImagePath);
                    $image = $NewImagePath;
                } else {
                    $image = $_POST['old_image'];
                }

                $data =
                    [
                        'name' => $name,
                        'image' => $image
                    ];


                Product::Update($_POST['UpId'], $data);
                header("location: /Product");
            }
        }
    }


    public function create()
    {


        if (isset($_POST['Add'])) {
            if (!empty($_POST['ProductName']) && !empty($_FILES['image'])) {

                $name = htmlspecialchars(strip_tags($_POST['ProductName']));
                $image = $_FILES['image']['name'];
                $ImagePath = 'image/' . $image;

                move_uploaded_file($_FILES['image']['tmp_name'], 'App/Views/product/' . $ImagePath);

                $data =
                    [
                        'name' => $name,
                        'image' => $ImagePath
                    ];

                Product::Create($data);
                header("location: /Product");
            }
        }
    }

    public function deleteAll(){
        Product::DeleteAll();
        header("location: /Product");
    }
}
