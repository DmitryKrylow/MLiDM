/**
 * Возведение матрицы в степнь
 */
function powMatrix(n,matrix){
    if(n === 1)
        return matrix;
    return multiply(matrix,powMatrix(n-1,matrix));
}
/**
 * Умножение матриц
 */
function multiply(matrixA,matrixB){
    let matrixC = [];
    for(let i = 0; i < matrixA.length; i++){
        matrixC[i] = [];
    }
    for(let i = 0; i < matrixB[0].length;i++){
        for(let j = 0; j < matrixA.length; j++){
            let tmp = 0;
            for(let k = 0; k < matrixB.length;k++){
                tmp += matrixA[j][k] * matrixB[k][i];
            }
            matrixC[j][i] = tmp;
        }
    }
    return matrixC;
}
/**
* Валидация пар
*/
function validatePairs(element)
{
    let el1 = element.split(",")[0]
    let el2 = element.split(',')[1]
    let reg = new RegExp("[0-9]");
    return reg.test(el1) && reg.test(el2) && (el1 !== undefined && el2 !== undefined)
}
/**
 * Валидация множетсва
 */
function validateSet(element)
{
    let reg = new RegExp("[0-9]");
    return reg.test(element)
}
/**
 * создание таблицы смежности
 * @param mas
 */
function createTable(mas){
    table = []
    for(let i = 0; i < mas.length; i++){
        versh.add(mas[i].split(",")[0])
        versh.add(mas[i].split(",")[1])
    }
    for(let item of versh){
        table[item] = []
    }
    for(let el1 of versh){
        for(let el2 of versh){
            table[el1][el2] = 0;
        }
    }
    for(let i = 0; i < mas.length; i++){
        table[mas[i].split(",")[0]][mas[i].split(",")[1]] = 1;
    }
    let temp = []
    let i = 0;
    for(let el of versh){
        temp[i] = []
        let j = 0;
        for(let el1 of table[el]){
            if(el1 === undefined)
                continue
            temp[i][j] = el1
            j++;
        }
        i++;
    }
    table = temp;console.log(table);
}

/**
 *Создание единичной матрицы
 */
function createEmatrix(){
    for(let i = 0; i < table.length;i++){
        matrixE[i] = [];
        for(let j = 0; j < table[i].length;j++){
            matrixE[i][j] = 0;
            if(i === j){
                matrixE[i][j] = 1;
            }
        }
    }
}
/**
 *Создание единичной матрицы
 */
function unionMatrix(){
    for(let i = 0; i < matrixE.length;i++){
        res[i] = []
        for(let j = 0; j < matrixE[i].length; j++){
            res[i][j] = (matrixE[i][j] || matrixA[i][j] || matrixA_2[i][j] || matrixA_3[i][j]);
        }
    }
}
let table = [];
let matrixE = [];
let versh;
let matrixA = [] ,matrixA_2 = [],matrixA_3 = [];
let res = [];
function main()
{
    let mas1 = document.getElementById("versh").value
    let mas2 = document.getElementById("pairs").value
    let strError = "";
    mas1 = mas1.split(" ")
    mas2 = mas2.split(" ")
    for(let i=0; i<mas1.length; i++)
    {
        if(!validateSet(mas1[i])) {
            strError += "Ошибка в " + (i + 1) + " элементе первого массива \n"
        }
    }
    for(let i=0; i<mas2.length; i++)
    {
        if(!validatePairs(mas2[i])) {
            strError += "Ошибка в " + (i + 1) + " элементе второго массива \n"
        }
    }
    let resStr;
    if(strError === "")
    {
        versh = new Set(mas1)
        createTable(mas2)
        createEmatrix();
        matrixA = table;
        matrixA_2 = powMatrix(2,matrixA);
        matrixA_3 = powMatrix(3,matrixA);
        unionMatrix();
        console.log(matrixA);
        console.log(matrixA_2);
        console.log(matrixA_3);
        console.log(res);
        document.getElementById('result').innerHTML = "Результат рассчета:<br>" + resStr;

    }
    else {
        document.getElementById('result').innerHTML = strError
    }

}
