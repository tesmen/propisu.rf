<!DOCTYPE html>
<? include "phrazer.php"; ?> 
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="keywords" itemprop="keywords" content="сумма прописью онлайн, перевод чисел в слова" />
	<title>Прописью.РФ - Онлайн сервис помощи бухгалтерам и сотрудникам договорных отделов</title>
	<link rel="canonical" href="http://прописью.рф/"/>
	<link rel="stylesheet"  href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/speller.js"></script>
	<script type="text/javascript" src="ZeroClipboard.js"></script>

	<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
	<script type="text/javascript">		VK.init({apiId: 4873631, onlyWidgets: true});	</script>
	
</head>
<body>
<div class="wrapper">
	<div class="rollover">
		<div class="favorite">Добавьте в закладки <br> нажмите Ctrl + D</div>
		<i class="fa fa-bookmark fa-5x"></i>
	</div>
	<section class="header">
		<a href="http://прописью.рф/" title="Нажмите - будет другая фразочка...">
			<img src="logo.png" />
			<div class="title">
				<span class="site__title"> ПРОПИСЬЮ.РФ</span><br>
				<span class="site__description"><?=$slogan ?></span>
			</div>
		</a>	
	</section>
	<center>
		<img src="page_stopped.jpg"><br><br><br>
		<br><span class="site__title">Очень жаль, у нас ведутся работы. Мы вернемся утром!</span><br>
	</center>
</div>


<section class="footer">
	<a href="http://tesmen.co/">
		<p class="footer__text">Tesmen.co &nbsp 2015</p>
	</a>
	<div style="display: inline-block; width:75px; height: 15px;"></div>
		
	<!-- Yandex.Metrika informer -->
	<a href="https://metrika.yandex.ru/stat/?id=29676080&amp;from=informer"
	target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/29676080/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
	style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:29676080,lang:'ru'});return false}catch(e){}"/></a>
	<!-- /Yandex.Metrika informer -->

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function() {
			try {
				w.yaCounter29676080 = new Ya.Metrika({id:29676080,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true});
			} catch(e) { }
		});

		var n = d.getElementsByTagName("script")[0],
			s = d.createElement("script"),
			f = function () { n.parentNode.insertBefore(s, n); };
		s.type = "text/javascript";
		s.async = true;
		s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

		if (w.opera == "[object Opera]") {
			d.addEventListener("DOMContentLoaded", f, false);
		} else { f(); }
	})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="//mc.yandex.ru/watch/29676080" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->

</section>


	
<script type="text/javascript">
var client = new ZeroClipboard( document.getElementById('copybutton1') );
var client = new ZeroClipboard( document.getElementById('copybutton2') );
var client = new ZeroClipboard( document.getElementById('copybutton3') );
var client = new ZeroClipboard( document.getElementById('copybutton4') );
var client = new ZeroClipboard( document.getElementById('copybutton5') );
var client = new ZeroClipboard( document.getElementById('copybutton6') );

$( document ).ready(function(){
	
	$( "#withNDS" ).focus()
		
	$( "#copybutton1" ).click( function() {
		copySuccess(1);
	})
	$( "#copybutton2" ).click( function() {
		copySuccess(2);
	})
	$( "#copybutton3" ).click( function() {
		copySuccess(3);
	})
	$( "#copybutton4" ).click( function() {
		copySuccess(4);
	})
	$( "#copybutton5" ).click( function() {
		copySuccess(5);
	})
	$( "#copybutton6" ).click( function() {
		copySuccess(6);
	})

})

function copySuccess(id){
	for ( i = 1; i <= 6; i++){
		$("#copybutton"+i+"__text").text("Скопировать");
		$( "#fa"+i ).removeClass("fa-clipboard");
		$( "#fa"+i ).removeClass("fa-files-o");
		$( "#fa"+i ).addClass("fa-files-o");
	}
	$("#copybutton"+id+"__text").text("Сделано!");
	$( "#fa"+id ).removeClass("fa-files-o");
	$( "#fa"+id ).addClass("fa-clipboard");

}
function clearButtons(){
	$( ".popup" ).removeClass("is__block");
	$( ".popup" ).addClass("is__none");
	for ( i = 1; i <= 6; i++){
		$("#copybutton"+i+"__text").text("Скопировать");
		$( "#fa"+i ).removeClass("fa-clipboard");
		$( "#fa"+i ).removeClass("fa-files-o");
		$( "#fa"+i ).addClass("fa-files-o");
	}	
}
function withOutNdsFix(){
	var input = $( "#withOutNds" ).val();
	var score = clearNum(input);
	$( "#withOutNds" ).val(score.toFixed(2));
	clearButtons();
	publishAddNds(score.toFixed(2));	

}
function withNdsFix(){
	var input = $( "#withNds" ).val();
	var score = clearNum(input);
	$( "#withNds" ).val(score.toFixed(2));
	clearButtons();
	publishExtractNds(score.toFixed(2));
}
function publishExtractNds(number){
	clearButtons();
	var summ = clearNum(number);
	var fixed = trimFrac(summ, 2);
		
		$( "#withNds__frac" ).text(".." + example(summ));
		var frac = String(getFrac(summ));
		if (frac.length <= 2) { $( "#withONds__popup" ).addClass("is__none"); $( "#withNds__popup" ).removeClass("is__block") }
		if (frac.length > 2) {  $( "#withNds__popup" ).addClass("is__block"); $( "#withNds__popup" ).removeClass("is__none") }
	
	var r = parseInt(fixed);
	var k = getFrac(fixed, 2);
	var nds = extractNds(fixed);
	$( "#withOutNds" ).val((fixed-nds).toFixed(2));
	var ndsr = parseInt(nds);
	var ndsk = getFrac(nds.toFixed(2), 2);


	$( "#clipboard_text1" ).val(	numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) );
	$( "#clipboard_text2" ).val(	numToText(r, 0, "text", money[0]) + fullFill(k) +" "+ money[1][getCase(k)]);
	$( "#clipboard_text3" ).val(	numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб.");
	$( "#clipboard_text4" ).val(	numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
	$( "#clipboard_text5" ).val(	triple(r) +"."+fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + "), в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
	$( "#clipboard_text6" ).val(	triple(r) +"."+fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + fullFill(k) +" "+ money[1][getCase(k)] + ", в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб. " + numToText(ndsr, 0, "text", money[0]) + fullFill(ndsk) +" "+ money[1][getCase(ndsk)] + ")");
}


function publishAddNds(number){
	clearButtons();
	var input = clearNum(number);

		$( "#withOutNds__frac" ).text(".." + example(input));
		var frac = String(getFrac(input));
		if (frac.length <= 2) { $( "#withOutNds__popup" ).addClass("is__none"); $( "#withOutNds__popup" ).removeClass("is__block") }
		if (frac.length > 2) {  $( "#withOutNds__popup" ).addClass("is__block"); $( "#withOutNds__popup" ).removeClass("is__none") }

		var fixed = trimFrac(input, 2);
	var summ = addNds(fixed);
	$( "#withNds" ).val(summ.toFixed(2))
	var r = parseInt(summ);
	var k = getFrac(summ.toFixed(2), 2);
	var nds = summ - input;
	var ndsr = parseInt(nds);
	var ndsk = getFrac(nds.toFixed(2), 2);

	$( "#clipboard_text1" ).val(	numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) );
	$( "#clipboard_text2" ).val(	numToText(r, 0, "text", money[0]) + fullFill(k) +" "+ money[1][getCase(k)]);
	$( "#clipboard_text3" ).val(	numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб.");
	$( "#clipboard_text4" ).val(	numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
	$( "#clipboard_text5" ).val(	triple(r) +"."+fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + "), в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
	$( "#clipboard_text6" ).val(	triple(r) +"."+fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + fullFill(k) +" "+ money[1][getCase(k)] + ", в т.ч. НДС(18%) " + triple(ndsr)+"."+fullFill(ndsk) + " руб. " + numToText(ndsr, 0, "text", money[0]) + fullFill(ndsk) +" "+ money[1][getCase(ndsk)] + ")");
}

</script>


</body>