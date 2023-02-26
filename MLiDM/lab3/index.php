<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>

        <h1>Лабораторная работа №3</h1>
        <h3>Определение явялется ли отношение функцией в матрице NxN</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <p>Введите множество A </p>
                        <input type="text" name="mas1" id="definition">  <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Введите множество B </p>
                        <input type="text" name="mas2" id="value">  <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Введите матрицу смежности (элементы в строках отделять пробелом)</p>
                        <textarea type="text" name="matrix" id="matrix"></textarea> <br>
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
        <script src="/scripts/lab3.js" type="text/javascript"></script>
    </body>
<html>

