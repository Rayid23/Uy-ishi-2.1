<?php

use App\Controllers\CategoryController;
use App\Controllers\ProductController;
use App\Controllers\UserController;
use App\Routes\Route;

Route::get("/", [UserController::class,"login"]); #Страница Логина
Route::get("/Logout", [UserController::class,"logout"]); #Страница Удаление сессии
Route::get("/UserRegister", [UserController::class,"register"]); #Страница Регистрации
Route::post("/NewUser", [UserController::class,"create"]); #Новый Пользователь
Route::post("/CheckUser", [UserController::class,"check"]); #Проверка Пользователя

Route::get("/Product",[ProductController::class,"index"]); #Основная страница
Route::get("/ProductAdd",[ProductController::class, "createView"]); #Страница создание продукта
Route::get("/DeleteAll",[ProductController::class, "deleteAll"]); #Удалить все продукт
Route::post("/ProductCreate",[ProductController::class, "create"]); #Создать продукт
Route::post("/ProductRead",[ProductController::class, "read"]); #Читать продукт
Route::post("/ProductUpdate",[ProductController::class, "update"]); #Обновить продукт
Route::post("/ProductDelete",[ProductController::class, "delete"]); #Удалить продукт

Route::get("/Category", [CategoryController::class,"index"]); #Старница Категории
Route::get("/CategoryAdd",[CategoryController::class, "createView"]); #Страница создание Категории
Route::get("/DeleteAll",[CategoryController::class, "deleteAll"]); #Удалить все Категории
Route::post("/CategoryCreate",[CategoryController::class, "create"]); #Создать Категории
Route::post("/CategoryRead",[CategoryController::class, "read"]); #Читать Категорию
Route::post("/CategoryUpdate",[CategoryController::class, "update"]); #Обновить Категорию
Route::post("/CategoryDelete",[CategoryController::class, "delete"]); #Удалить Категорию







?>