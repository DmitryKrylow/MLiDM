<?php
if(isset($_POST['button1'])) {
    echo "Результат выполнения:<br><br>";
    main();
}
/**
 * Валидация таблицы смежности
 */
function validateMatrix()
{
    global $matrixA;
    $reg = "[0-1]";
    for($i = 0; $i < sizeof($matrixA);$i++){
        for($j = 0; $j < sizeof($matrixA[$i]);$j++){
            if(!preg_match($reg,$matrixA[$i][$j])){
                return false;
            }
        }
    }
    return true;
}
/**
 * Возведение матрицы в степнь
 */
function powMatrix($n,$matrix){
    if($n <= 1)
        return $matrix;
    return multiply($matrix,powMatrix($n-1,$matrix));
}
/**
 * Умножение матриц
 *
 */
function multiply($matrixA,$matrixB){
    $matrixC = array();
    for($i = 0; $i < sizeof($matrixA); $i++){
        $matrixC[$i] = array();
    }
    for($i = 0; $i < sizeof($matrixB[0]);$i++){
        for($j = 0; $j < sizeof($matrixA); $j++){
            $tmp = 0;
            for($k = 0; $k < sizeof($matrixB);$k++){
                $tmp += $matrixA[$j][$k] * $matrixB[$k][$i];
            }
            $matrixC[$j][$i] = $tmp;
        }
    }
    return $matrixC;
}
/**
 *Создание единичной матрицы
 */
function createEmatrix(){
    global $matrixA;
    global $matrixE;
    for($i = 0; $i < sizeof($matrixA);$i++){
        $matrixE[$i] = array();
        for($j = 0; $j < sizeof($matrixA);$j++){
            $matrixE[$i][$j] = 0;
            if($i === $j){
                $matrixE[$i][$j] = 1;
            }
        }
    }
}
/**
 *Создание единичной матрицы
 */
function unionMatrixFirst()
{
    global $matrixE;
    global $res;
    global $matrixA;
    for ($i = 0; $i < sizeof($matrixE); $i++) {
        $res[$i] = array();
        for ($j = 0; $j < sizeof($matrixE[$i]); $j++){
            $res[$i][$j] = $matrixE[$i][$j] | $matrixA[$i][$j] ? 1 : 0;
        }
    }
}
function unionMatrix()
{
    global $matrixE;
    global $res;
    global $tmp_matrix;
    for ($i = 0; $i < sizeof($matrixE); $i++) {
        for ($j = 0; $j < sizeof($matrixE[$i]); $j++){
            $res[$i][$j] = $res[$i][$j] | $tmp_matrix[$i][$j] ? 1 : 0;
        }
    }
}
$matrixE = array();
$matrixA = array();
$res = array();
function main()
{
    global $matrixA;
    global $matrixA_3;
    global $res;
    global $matrixE;
    $matrixA = $_POST['matrix'];
    $matrixA = explode("\n",$matrixA);
    for($i = 0; $i < sizeof($matrixA); $i++){
        $matrixA[$i] = explode(" ",$matrixA[$i]);
    }
    $strError = "";
    for($i = 0; $i < sizeof($matrixA); $i++){
        for($j = 0; $j < sizeof($matrixA[$i]);$j++){
            if(sizeof($matrixA) != sizeof($matrixA[$i])){
                echo "матрица имеет неверные размеры<br>";
                return;
            }
        }
    }

    createEmatrix();
    unionMatrixFirst();
    $n = sizeof($matrixA) - 1;
    $tmp_matrix = array();
    global $tmp_matrix;
    for($i = 2; $i <= $n; $n--){
        $tmp_matrix = powMatrix($n,$matrixA);
        unionMatrix();
    }
    echo "матрица достижимости<br>";
    for($i = 0; $i < sizeof($res); $i++){
        for($j = 0; $j < sizeof($res[$i]); $j++){
            echo $res[$i][$j];
            echo " ";
        }
        echo"<br>";
    }
}
?>