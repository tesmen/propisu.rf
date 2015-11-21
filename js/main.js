
var client = new ZeroClipboard(document.getElementById('copybutton1'));
var client = new ZeroClipboard(document.getElementById('copybutton2'));
var client = new ZeroClipboard(document.getElementById('copybutton3'));
var client = new ZeroClipboard(document.getElementById('copybutton4'));
var client = new ZeroClipboard(document.getElementById('copybutton5'));
var client = new ZeroClipboard(document.getElementById('copybutton6'));

$(document).ready(function () {

    $("#withNDS").focus()

    $("#copybutton1").click(function () {
        copySuccess(1);
    })
    $("#copybutton2").click(function () {
        copySuccess(2);
    })
    $("#copybutton3").click(function () {
        copySuccess(3);
    })
    $("#copybutton4").click(function () {
        copySuccess(4);
    })
    $("#copybutton5").click(function () {
        copySuccess(5);
    })
    $("#copybutton6").click(function () {
        copySuccess(6);
    })

})

function copySuccess(id) {
    for (i = 1; i <= 6; i++) {
        $("#copybutton" + i + "__text").text("Скопировать");
        $("#fa" + i).removeClass("fa-clipboard");
        $("#fa" + i).removeClass("fa-files-o");
        $("#fa" + i).addClass("fa-files-o");
    }
    $("#copybutton" + id + "__text").text("Сделано!");
    $("#fa" + id).removeClass("fa-files-o");
    $("#fa" + id).addClass("fa-clipboard");

}
function clearButtons() {
    $(".popup").removeClass("is__block");
    $(".popup").addClass("is__none");
    for (i = 1; i <= 6; i++) {
        $("#copybutton" + i + "__text").text("Скопировать");
        $("#fa" + i).removeClass("fa-clipboard");
        $("#fa" + i).removeClass("fa-files-o");
        $("#fa" + i).addClass("fa-files-o");
    }
}
function withOutNdsFix() {
    var input = $("#withOutNds").val();
    var score = clearNum(input);
    $("#withOutNds").val(score.toFixed(2));
    clearButtons();
    publishAddNds(score.toFixed(2));

}
function withNdsFix() {
    var input = $("#withNds").val();
    var score = clearNum(input);
    $("#withNds").val(score.toFixed(2));
    clearButtons();
    publishExtractNds(score.toFixed(2));
}
function publishExtractNds(number) {
    clearButtons();
    var summ = clearNum(number);
    var fixed = trimFrac(summ, 2);

    $("#withNds__frac").text(".." + example(summ));
    var frac = String(getFrac(summ));
    if (frac.length <= 2) {
        $("#withNds__popup").addClass("is__none");
        $("#withNds__popup").removeClass("is__block")
    }
    if (frac.length > 2) {
        $("#withNds__popup").addClass("is__block");
        $("#withNds__popup").removeClass("is__none")
    }

    var r = parseInt(fixed);
    var k = getFrac(fixed, 2);
    var nds = extractNds(fixed);
    $("#withOutNds").val((fixed - nds).toFixed(2));
    var ndsr = parseInt(nds);
    var ndsk = getFrac(nds.toFixed(2), 2);


    $("#clipboard_text1").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]));
    $("#clipboard_text2").val(numToText(r, 0, "text", money[0]) + fullFill(k) + " " + money[1][getCase(k)]);
    $("#clipboard_text3").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб.");
    $("#clipboard_text4").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
    $("#clipboard_text5").val(triple(r) + "." + fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + "), в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
    $("#clipboard_text6").val(triple(r) + "." + fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + fullFill(k) + " " + money[1][getCase(k)] + ", в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. " + numToText(ndsr, 0, "text", money[0]) + fullFill(ndsk) + " " + money[1][getCase(ndsk)] + ")");
}


function publishAddNds(number) {
    clearButtons();
    var input = clearNum(number);

    $("#withOutNds__frac").text(".." + example(input));
    var frac = String(getFrac(input));
    if (frac.length <= 2) {
        $("#withOutNds__popup").addClass("is__none");
        $("#withOutNds__popup").removeClass("is__block")
    }
    if (frac.length > 2) {
        $("#withOutNds__popup").addClass("is__block");
        $("#withOutNds__popup").removeClass("is__none")
    }

    var fixed = trimFrac(input, 2);
    var summ = addNds(fixed);
    $("#withNds").val(summ.toFixed(2))
    var r = parseInt(summ);
    var k = getFrac(summ.toFixed(2), 2);
    var nds = summ - input;
    var ndsr = parseInt(nds);
    var ndsk = getFrac(nds.toFixed(2), 2);

    $("#clipboard_text1").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]));
    $("#clipboard_text2").val(numToText(r, 0, "text", money[0]) + fullFill(k) + " " + money[1][getCase(k)]);
    $("#clipboard_text3").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб.");
    $("#clipboard_text4").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + ", в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
    $("#clipboard_text5").val(triple(r) + "." + fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]) + "), в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");
    $("#clipboard_text6").val(triple(r) + "." + fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0]) + fullFill(k) + " " + money[1][getCase(k)] + ", в т.ч. НДС(18%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. " + numToText(ndsr, 0, "text", money[0]) + fullFill(ndsk) + " " + money[1][getCase(ndsk)] + ")");
}
