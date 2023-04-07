<?php
$title = "Лаба 5";
include_once('../header.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <div class="content">
        <h1>Лабораторная работа №5</h1>
        <h3>Построение матрицы достижимости</h3>
        <form action="" method="POST">
            <p>Введите матрицу смежности (элементы в строках отделять пробелом)</p>
            <textarea type="text" name="matrix" id="matrix" ><?php if (!empty($_POST["matrix"])) echo $_POST['matrix']; ?></textarea> <br>
            <input type="submit" class="button" name="button1" value="Получить результат">
        </form>
        <br><br>
    </div>
        <div id="result">
            <?php
            include('scripts/lab5.php');
            ?>
        </div>
    </body>
<html>

