<?php
if(isset($_POST['button1'])) {
    echo "Результат выполнения:<br><br>";
    main();
}
function validateMatrix()
{
    global $ves;
    $reg = '/[0-9]+/';
    for($i = 0; $i < sizeof($ves);$i++){
        for($j = 0; $j < sizeof($ves[$i]);$j++){
            if(!preg_match($reg,$ves[$i][$j])){
                return false;
            }
        }
    }
    return true;
}


function main() : void {
    $matrix_sv = [[]];
    $min_d = array();
    $visited = array();
    $versh = array();
    $ves = array();
    $min_index = 0;
    $min = 0;
    $temp = 0;
    $inf = 10000;
    $begin_index = $_POST['start'] - 1;
    $end = $_POST['end'];
    global $ves;

    $ves = $_POST['matrix'];
    $versh = $_POST['versh'];
    $versh = explode(" ",$versh);
    $ves = explode("\n",$ves);
    for($i = 0; $i < sizeof($ves); $i++){
        $ves[$i] = explode(" ",$ves[$i]);
    }
    if(!validateMatrix()){
        echo "Неверный формат ввода. Только Цифры!";
        return;
    }
    for($i = 0; $i < sizeof($ves); $i++){
        for($j = 0; $j < sizeof($ves[$i]);$j++){
            if(sizeof($versh) != sizeof($ves[$i])){
                echo "матрица имеет неверные размеры<br>";
                return;
            }
        }
    }


    for($i = 0; $i < sizeof($versh); $i++){
        $matrix_sv[$i][$i] = 0;
        for($j = $i + 1; $j < sizeof($versh); $j++){
            $matrix_sv[$i][$j] = $ves[$i][$j];
            $matrix_sv[$j][$i] = $ves[$i][$j];
        }
    }
    for($i = 0; $i < sizeof($ves); $i++){
        $min_d[$i] = $inf;
        $visited[$i] = 1;
    }
    $min_d[$begin_index] = 0;
    do{
        $min_index = $inf;
        $min = $inf;
        for($i = 0; $i < sizeof($versh); $i++){
            if($visited[$i] == 1 && ($min_d[$i] < $min)){
                $min = $min_d[$i];
                $min_index = $i;
            }
        }
        if($min_index != $inf){
            for($i = 0; $i < sizeof($versh); $i++){
                if($matrix_sv[$min_index][$i] > 0){
                    $temp = $min + $matrix_sv[$min_index][$i];
                    if($temp < $min_d[$i]){
                        $min_d[$i] = $temp;
                    }
                }
            }
        }
        $visited[$min_index] = 0;
    }while($min_index < $inf);

    $restore = [];
    $end_index = $end - 1;
    $restore[0] = $end_index + 1;
    $prev = 1;
    $ves_ver = $min_d[$end_index];
    while($end_index != $begin_index){
        for($i = 0; $i < sizeof($versh); $i++){
            if($matrix_sv[$i][$end_index] != 0) {
                $tmp = $ves_ver - $matrix_sv[$i][$end_index];
                if ($tmp == $min_d[$i]) {
                    $ves_ver = $tmp;
                    $end_index = $i;
                    $restore[$prev] = $i + 1;
                    $prev++;
                }
            }
        }
    }
    echo "Кратчайший путь из ",$begin_index + 1, " до ", $end," = ", $min_d[$end - 1],'<br>';
    for($i = $prev - 1; $i >= 0; $i--){
        echo $restore[$i],' ';
    }
}
?>