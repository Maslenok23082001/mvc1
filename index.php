<?php

// FRONT COTROLLER

// 1. Общие настройки

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

// 2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
include(ROOT."/components/Router.php");

// 3. Установка соединения с БД


// 4. Вызор Router
$Router = new Router();
$Router->run();
?>
<p>Это Главная страница</p>
<a href="/news">смотреть новости</a>
