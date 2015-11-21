<script>
var speller = {}

speller.clearNum = function(number){
	var str = String(number);
	var spaceless = str.replace(/\s/g, '');
	var commaless = spaceless.replace(/,/g, '.');
	var prepared = parseFloat(commaless);
	var abs = Math.abs(prepared);
	if (abs == "") { return 0;}
	if (isNaN(abs)) { return 0;}
	return abs;
}

</script>