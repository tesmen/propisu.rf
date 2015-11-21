<script>
var speller = {
	inputIncNDS: 0,
	inputExcNDS: 0,
	summIncNDS : 0,
	summExcNDS : 0,
	summClrNDS : 0,
	NDSbase : 18
}

// speller.clearNumber(number)
// очистка строки от пробелов, замена запятых на точки, parseInt
// возвращает float
speller.clearNumber = function(number){
	var str = String(number);
	var spaceless = str.replace(/\s/g, '');
	var commaless = spaceless.replace(/,/g, '.');
	var prepared = parseFloat(commaless);
	var abs = Math.abs(prepared);
	if (abs == "") { return 0;}
	if (isNaN(abs)) { return 0;}
	return abs;
}

// speller.trimFrac(number, length)
// обрезка(не округление) дробной части после length символов, после запятой.
// length MAX = 12, после округляет
// возвращает float
speller.trimFrac = function(number, length) {
	if (length === undefined) { return parseFloat(number) }
	if (isNaN(number)) { return 0;}
	str = String(number);
	if (str == "") { return 0;}
	if(str.indexOf(".") >=0) {
		dotPos = str.indexOf(".") + 1;
		trim = str.substring(0, dotPos + length);
		return parseFloat(trim);
	}
	if(str.indexOf(".") < 0) {
		return parseFloat(number);
	}
}

// speller.getFrac(number, length)
// получение length элементов дробной части number
// при неуказанном length отдает всю дробную часть
// возвращает parseInt
speller.getFrac = function(number, length){
	(length === undefined ? length = 0 : "")
	if (isNaN(number)) { return 0;}
	str = String(number);
	if (str == "") { return 0;}
	if(str.indexOf(".") >=0 && length == 0) {
		dotPos = str.indexOf(".") + 1;
		trim = str.substring(dotPos, str.length);
		if (trim == "") { return 0;}
		return parseInt(trim);
	}
	if(str.indexOf(".") >=0) {
		dotPos = str.indexOf(".") + 1;
		trim = str.substring(dotPos, dotPos + length);
		if (trim == "") { return 0;}
		return parseInt(trim);
	}
	if(str.indexOf(".") < 0) {
		return 0;
	}
}

// addNds()
speller.addNDS = function(){
	this.summIncNDS = this.summExcNDS*(1+this.NDSbase/100);
}

// extractNDS()
speller.extractNDS = function(foo, base){
	result = -((foo/(1 + base/100)) - foo);
}

// запуск
speller.init = function(){
	console.log(this)
}

// подача спеллеру суммы с НДС
speller.grabIncNDS = function(input){
	this.inputIncNDS = this.clearNumber(input)
	this.summExcNDS = this.extractNDS(this.inputIncNDS, this.NDSbase)
	
}

</script>

<button type = "button" onclick="speller.init()">SayIt</button>
<button type = "button" onclick="foo(300.60)">300.60</button>

<script>
function foo(bar){
	speller.grabIncNDS(300.60)
}
</script>