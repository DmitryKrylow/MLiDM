<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <h1>Лабораторная работа №2</h1>
        <form action="" method="POST" onSubmit="javascript: return getData(this)">
            Введите множество вершин в формате x x1 x2 x3(целые положительные числа)
            <input type="text" name="mas2" id="versh">  <br>
            Введите пары чисел в формате x,y x1,y1 x2,y2 (целые положительные пары чисел)
            <input type="text" name="mas1" id="pairs">  <br>
            <input type="button" onClick="main()" value="получить результат">
        </form>
        <br><br>

        <div id="result">


        </div>
        <script src="/scripts/functions.js" type="text/javascript"></script>
    </body>
<html>

