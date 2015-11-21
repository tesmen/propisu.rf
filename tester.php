<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/speller.js"></script>

<input  type="text" placeholder="Cумма с НДС" oninput="F1(this.value)" value="1000" />
<input  type="text" placeholder="Cумма без НДС" id="Out1"  /> numToText
<br><br>

<input  type="text" placeholder="Cумма с НДС" oninput="F2(this.value)" value="1000" />
<input  type="text" placeholder="Cумма без НДС" id="Out2"  /> getDigits
<br><br>

<input  type="text" placeholder="Cумма с НДС" oninput="F3(this.value)" value="1000" />
<input  type="text" placeholder="Cумма без НДС" id="Out3"  /> spell
<br><br>

<input  type="text" placeholder="Cумма с НДС" oninput="F4(this.value)" value="1000" />
<input  type="text" placeholder="Cумма без НДС" id="Out4"  /> addNds
<br><br>

<input  type="text" placeholder="Cумма с НДС" oninput="F5(this.value)" value="1000" />
<input  type="text" placeholder="Cумма без НДС" id="Out5"  /> extractNds
<br><br>


<script>
	$( document ).ready(function(){	})
	
	function F1(input){
		$("#Out1").val(numToText(input, 0, "text", money[0]))
	}
	function F2(input){
		$("#Out2").val(getDigits(input))
	}
	function F3(input){
		$("#Out3").val(spell(input, 1))
	}
	function F4(input){
		$("#Out4").val(addNds(input))
	}
	function F5(input){
		$("#Out5").val(extractNds(input))
	}
</script>