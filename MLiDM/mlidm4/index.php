<?php
$title = "Лаба 4";
include_once('../header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="content">
<h1>Лабораторная работа №4</h1>
<h3>опредление кратчайшего пути на неориентированном графе</h3>
<form action="" method="POST">
    <table>
        <tr>
            <td>
                <p>Введите множество вершин графа</p>
                <input type="text" name="versh" id="versh" value="<?php if (!empty($_POST["versh"])) echo $_POST['versh']; ?>">  <br>
            </td>
        </tr>
        <tr>
            <td>
                <p>Введите начальную вершину</p>
                <input type="text" name="start" id="start" value="<?php if (!empty($_POST["start"])) echo $_POST['start']; ?>">  <br>
            </td>
        </tr>
        <tr>
            <td>
                <p>Введите конечную вершину</p>
                <input type="text" name="end" id="end" value="<?php if (!empty($_POST["end"])) echo $_POST['end']; ?>">  <br>
            </td>
        </tr>
        <tr>
            <td>
                <p>Введите матрицу расстояний (элементы строки разделять пробелом)</p>
                <textarea type="text" name="matrix" id="matrix"><?php if (!empty($_POST["matrix"])) echo $_POST['matrix']; ?></textarea> <br>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" class="button" name="button1" value="Получить результат"/>
            </td>
        </tr>
    </table>
</form>
</div>
<div id="result">
<?php
include('scripts/lab4.php')
?>
</div>
</body>
<html>
