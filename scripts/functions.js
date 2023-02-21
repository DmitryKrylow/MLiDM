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
let table = [];
let versh;
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
 * Проверка на рефлексиновсть
 * @returns boolean
 */
function isReflex(){
    let reflex = true;
    for(let i = 0; i < table.length; i++){
        for(let j = 0; j < table[i].length; j++){
            if(i === j && table[i][j] === 0){
                reflex = false;
            }
        }
    }
    return reflex;
}
/**
 * Проверка на симместричность
 * @return boolean
 */
function isSymmetry(){
    let symmetry = true;
    for(let i = 0; i < table.length; i++){
        for(let j = 0; j < table[i].length; j++){
            if(table[i][j] !== table[j][i]){
                symmetry = false;
            }
        }
    }
    return symmetry;
}
/**
 * Проверка на кососимметричность
 * @return boolean
 */
function isAntiSymmetry(){
    let antiSymmetry = true;
    for(let i = 0; i < table.length; i++){
        for(let j = 0; j < table[i].length; j++){
            if((table[i][j] && !table[j][i] && i !== j)){
                antiSymmetry = false;
            }
        }
    }
    return antiSymmetry;
}

/**
 * Проверка на транзитивность
 * @return boolean
 */
function isTransitivity(){
    let transitivity = true;
    for(let i = 0; i < table.length; i++){
        for(let j = 0; j < table[i].length; j++){
            for(let k = 0; k < table[j].length; k++){
                if(table[i][k] && table[k][j] && !table[i][j]){
                    transitivity = false;
                }
            }
        }
    }
    return transitivity;
}

/**
 * Основная функция
 */
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
        resStr = isReflex() ? "рефлексивная<br>" : "не рефлексивная<br>";
        resStr += isSymmetry() ? "симместричная<br>" : "не симместричная<br>"
        resStr += isTransitivity() ? "транзитивная<br>" : "не транзитивная<br>"
        resStr += isAntiSymmetry() ? "кососимметричная<br>" : "не кососимметричная<br>"
        document.getElementById('result').innerHTML = "Результат рассчета:<br>" + resStr;

    }
    else {
        document.getElementById('result').innerHTML = strError
    }

}