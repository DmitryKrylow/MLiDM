/**
 * Валидация элементов множеств
 * @param element
 * @return {boolean}
 */
function validate(element)
{
    let reg = new RegExp("[0-9a-zA-Z]");
    return reg.test(element)
}
/**
 * Валидация таблицы смежности
 * @param element
 * @return {boolean}
 */
function validateMatrix(element)
{
    let reg = new RegExp("[0-1]");
    for(let el of element.split(" ")){
        if(!reg.test(el)){
            return false;
        }
    }
    return true;
}

/**
 * Функция подсчета
 */
function count (str,c){
    let res = 0;
    for(let el of str){
        if(el === c)
            res++;
    }
    return res;
}

/**
 * Проверка на функцию
 * @return {String}
 */
function checkFunction(){
    let res = ""
    let isFunc = true;
    for(let i = 0; i < matrix.length;i++){
        if(count(matrix[i],'1') !== 1){
            isFunc = false;
            break;
        }
    }
    if(isFunc){
        res += "A -> B функция<br><br>"
    }else{
        res += "A -> B не функция<br>"
    }
    isFunc = true
    for(let i = 0; i < matrix.length;i++){
        let cnt = 0;
        matrix[i] = matrix[i].split(" ");
        for(let j = 0; j < matrix[i].length;j++){
            if(matrix[j][i] === '1'){
                cnt++;
            }
        }
        if(cnt !== 1){
            isFunc = false;
            break;
        }
    }
    if(isFunc){
        res += "B -> A функция<br>"
    }else{
        res += "B -> A не функция<br>"
    }
    return res;
}

/**
 * Основная функция
 */
let def;
let val;
let matrix;
function main()
{
    def = document.getElementById("definition").value
    val = document.getElementById("value").value
    matrix = document.getElementById("matrix").value
    let strError = "";
    def = new Set(def.split(" "))
    val = new Set(val.split(" "))
    matrix = matrix.split("\n")
    for(let i=0; i<def.length; i++)
    {
        if(!validate(def[i])) {
            strError += "Ошибка в " + (i + 1) + " элементе первого массива <br>"
        }
    }
    for(let i=0; i<val.length; i++)
    {
        if(!validate(val[i])) {
            strError += "Ошибка в " + (i + 1) + " элементе второго массива <br>"
        }
    }
    for(let i=0; i<matrix.length; i++)
    {
        if(!validateMatrix(matrix[i])) {
            strError += "Ошибка в " + (i + 1) + " элементе матрицы <br>"
        }
        if(matrix.length < def.length || matrix[i].split(" ").length < val.length || def.size !== val.size){
            strError += "Несоответсвие размеров матрицы и множеств \n"
            break;
        }
    }

    if(strError === "")
    {
        document.getElementById('result').innerHTML = "Результат рассчета:<br>" + checkFunction()

    }
    else {
        document.getElementById('result').innerHTML = strError
    }

}