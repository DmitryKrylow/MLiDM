<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <h1>Лабораторная работа №2</h1>
        <h3>Транзитивность, кососимметричность, симметричность, рефлексивность.</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <p>Введите множество вершин в формате x x1 x2 x3(целые положительные числа через пробел)</p>
                        <input type="text" name="mas1" id="versh">  <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Введите пары чисел в формате x,y x1,y1 x2,y2 (целые положительные пары чисел через пробел)</p>
                        <input type="text" name="mas2" id="pairs">  <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" onClick="main()" value="Получить результат">
                    </td>
                </tr>
            </table>

        </form>
        <br><br>

        <div id="result">


        </div>
        <script src="/scripts/functions.js" type="text/javascript"></script>
    </body>
<html>

