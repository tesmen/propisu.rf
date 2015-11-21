function triple(number) { // деление на разряды пробелами 132456789 -> 123 456 789
    var val = parseInt(number);
    return getDigits(val).join(" ");
}

function getDigits(number, reverse) { //(число, реверс 1-вкл) разбивает строку на массив из разрядов
    (reverse === undefined ? reverse = 0 : "");
    var result = new Array;
    var str = String(number);
    digitsCount = Math.ceil(str.length / 3);
    //return digitsCount;
    if (reverse == 0) {
        for (i = digitsCount - 1; i >= 0; i--) {
            start = str.length - (3 * (digitsCount - i - 1));
            end = str.length - (3 * (digitsCount - i));
            result[i] = str.substring(start, end);
        }
        return result;
    }
    if (reverse == 1) {
        for (i = 0; i <= digitsCount - 1; i++) {
            start = str.length - (3 * (1 + i));
            end = str.length - (3 * i);
            result[i] = str.substring(start, end);
        }
        return result;
    }
}

function getCase(number) { // возвращает номер падежа согласно чисел 0 - 1 - 2 
    (number < 10 ? str = "0" + String(number) : str = String(number));
    lasttwo = str.substring(str.length - 2, str.length)
    switch (lasttwo) {
        case ( "11" ):
        case ( "12" ):
        case ( "13" ):
        case ( "14" ):
            return 0;
            break;
    }
    switch (lasttwo[1]) {
        case ( "1" ):
            return 1;
            break;
        case ( "2" ):
        case ( "3" ):
        case ( "4" ):
            return 2;
            break;

    }
    return 0;
}

function spell(number, sex) { // (число - 3 знака, 0-М 1-Ж) N: spell(123,1)
    numbers = {
        m0: ['', 'сто ', 'двести ', 'триста ', 'четыреста ', 'пятьсот ', 'шестьсот ', 'семьсот ', 'восемьсот ', 'девятьсот '],
        m1: ['', 'десять ', 'двадцать ', 'тридцать ', 'сорок ', 'пятьдесят ', 'шестьдесят ', 'семьдесят ', 'восемьдесят ', 'девяносто '],
        m2: ['', 'один ', 'два ', 'три ', 'четыре ', 'пять ', 'шесть ', 'семь ', 'восемь ', 'девять '],
        f2: ['', 'одна ', 'две ', 'три ', 'четыре ', 'пять ', 'шесть ', 'семь ', 'восемь ', 'девять '],
        l0: ['десять ', 'одиннадцать ', 'двенадцать ', 'тринадцать ', 'четырнадцать ', 'пятнадцать ', 'шестнадцать ', 'семнадцать ', 'восемнадцать ', 'девятнадцать ']
    }
    if (typeof(sex) === 'undefined') {
        sex = 0
    }
    ;
    res2s = ( sex == 1 ? "f2" : "m2" );
    str = String(number);
    (number < 1000 ? str = String(number) : "");
    (number < 100 ? str = "0" + String(number) : "");
    (number < 10 ? str = "00" + String(number) : "");
    lastThree = str.substring(str.length - 3, str.length);
    res0 = numbers['m0'][lastThree[0]];
    res1 = (lastThree[1] == 1 ? numbers['l0'][lastThree[2]] : numbers['m1'][lastThree[1]] );
    res2 = ( lastThree[1] == "1" ? "" : numbers[res2s][lastThree[2]] );
    result = res0 + res1 + res2;
    return result;
}

function numToText(num, objsex, format, obj) { //(numToText(input, 0, "text", money[0]))
    if (num > 999999999999999 || isNaN(num)) {
        return " (x_x) ";
    }


    var words = {
        0: ['', '', ''],
        1: ['тысяч ', 'тысяча ', 'тысячи '],
        2: ['миллионов ', 'миллион ', 'миллиона '],
        3: ['миллиардов ', 'миллиард ', 'миллиарда '],
        4: ['триллионов ', 'триллион ', 'триллиона '],
        5: ['квадриллионов ', 'квадриллион ', 'квадриллионов ']
    }
    var sex = [
        objsex,
        1,
        0,
        0,
        0,
        0,
    ];
    var digits = getDigits(num, 1)
    var line = "";
    if (num == 0 && format == "text") {
        return "ноль " + obj[getCase(digits[0])];
    }
    if (num == 0 && format == "number") {
        return "0 " + obj[getCase(digits[0])];
    }
    if (format == "text") {
        for (i = digits.length - 1; i >= 0; i--) {
            line += spell(digits[i], sex[i]);
            line += (digits[i] != 0 ? words[i][getCase(digits[i])] : "");

        }
        line += obj[getCase(digits[0])];
        return line;
    }

    if (format == "number") {
        line += triple(num) + " " + obj[getCase(num)];
        return line;
    }
}

function example(number) {
    var str = String(number);
    var dotPos = str.indexOf(".");
    var result = str.substring(dotPos - 2, dotPos + 4);
    return parseFloat(result).toFixed(2);
}

money = {
    0: ['рублей ', 'рубль ', 'рубля '],
    1: ['копеек', 'копейка', 'копейки'],
}

function prepare(number) { // замена запятых на точки, удаление пробелов, оставляет два знака п зап без округл
    if (number == "") {
        return "0.00";
    }
    var str = String(number);
    var spaceless = str.replace(/\s/g, '');
    var commaless = spaceless.replace(/,/g, '.');
    var prepared = parseFloat(commaless);
    var result = String(prepared);
    var dot = result.indexOf(".")
    if (dot >= 0) {
        dif = result.length - 1 - dot;
        switch (dif) {
            case 0 :
                result += "00";
                break;
            case 1 :
                result += "0";
                break;
            default :
                result = result.substring(0, dot + 3);
                break;
        }
    } else if (dot == -1) {
        result += ".00"
    }

    return result;
}

function tripleVIAregExp(number) { // деление на разряды пробелами 132456789 -> 123 456 789
    number += "";
    number = new Array(4 - number.length % 3).join("U") + number;
    return number.replace(/([0-9U]{3})/g, "$1").replace(/U/g, "");
}