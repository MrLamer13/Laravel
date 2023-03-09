<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

$title = 'Агрегатор новостей';

Route::get('/', function () use ($title) {
    return <<<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$title</title>
</head>
<body>
    <h1>Приветствие!</h1>
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Expedita ipsum totam enim ea earum harum reiciendis saepe id sequi cupiditate porro,
unde necessitatibus voluptate tempore molestiae accusamus vitae? Dolorum, porro?
</body>
</html>
php;
});

Route::get('/about', function () use ($title) {
    return <<<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$title</title>
</head>
<body>
    <h1>О сайте.</h1>
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Expedita ipsum totam enim ea earum harum reiciendis saepe id sequi cupiditate porro,
unde necessitatibus voluptate tempore molestiae accusamus vitae? Dolorum, porro?
</body>
</html>
php;
});

Route::get('/news', function () use ($title) {
    return <<<php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$title</title>
</head>
<body>
    <h1>Список новостей.</h1>
Lorem ipsum dolor sit amet, consectetur adipisicing elit.
Expedita ipsum totam enim ea earum harum reiciendis saepe id sequi cupiditate porro,
unde necessitatibus voluptate tempore molestiae accusamus vitae? Dolorum, porro?
</body>
</html>
php;
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello, $name!";
});

Route::get('/phpinfo', function () {
    phpinfo();
});
