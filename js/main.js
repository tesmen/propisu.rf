{//vars
    const c_withNds = 'c_withNds';
    const c_noNds = 'c_noNds';
    var withNdsPopup = $("#withNds__popup");
    var noNdsPopup = $("#withOutNds__popup");
    var withNdsInput = $("#nds-in");
    var noNdsInput = $("#no-nds-in");

    var taxInput = $("#tax");
    var rememberTax = $("#remember_tax");

    var fixWithNdsButton = $("#withNds__frac");
    var fixNoNdsButton = $("#noNds__frac");

    var lastInput = null;
}

{//eventListeners
    withNdsInput.on('input', function () {
        summInputEvent(c_withNds);
    });

    noNdsInput.on('input', function () {
        summInputEvent(c_noNds);
    });

    taxInput.on('input', function () {
        if (taxInput.val() < 0) {
            taxInput.val(0);
            return;
        }
        if ('' === taxInput.val()) {
            taxInput.val(0);
            return;
        }
        rememberTaxBoxEvent();
        taxInputEvent();
    });

    fixNoNdsButton.on('click', function () {
        noNdsFix();
    });

    fixWithNdsButton.on('click', function () {
        withNdsFix();
    });

    rememberTax.on('change', function () {
        rememberTaxBoxEvent();
    });
}

{//common.js-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
    function getDecimal(num) {
        return (num - parseInt(num))
    }

    function getWhole(num) {
        return +(num % 1).toFixed(6);
    }

    function clearNum(number) {
        var str = String(number);
        var spaceless = str.replace(/\s/g, '');
        var commaless = spaceless.replace(/,/g, '.');
        var prepared = parseFloat(commaless);
        var abs = Math.abs(prepared);
        if (abs == "") {
            return 0;
        }

        if (isNaN(abs)) {
            return 0;
        }

        return abs;
    }

    /**
     * обрезает(не округляя) число до length знака после запятой
     * 10.599999 -> 10.59
     */
    function trimFrac(number, length) {
        if (isNaN(number)) {
            return 0;
        }

        var str = String(number);

        if (str == "") {
            return 0;
        }
        if (str.indexOf(".") >= 0) {
            var dotPos = str.indexOf(".") + 1;
            var trim = str.substring(0, dotPos + length);
            return parseFloat(trim);
        }
        if (str.indexOf(".") < 0) {
            return parseFloat(number);
        }
    }

    /**
     * возвращает(не округляя) lenght знаков десятичной части числа
     * 10.599999 -> 59
     */
    function getFrac(number, length) {
        (length === undefined ? length = 0 : "")
        if (isNaN(number)) {
            return 0;
        }

        var str = String(number);
        if (str == "") {
            return 0;
        }

        if (str.indexOf(".") >= 0 && length == 0) {
            var dotPos = str.indexOf(".") + 1;
            var trim = str.substring(dotPos, str.length);
            if (trim == "") {
                return 0;
            }
            return parseInt(trim);
        }

        if (str.indexOf(".") >= 0) {
            dotPos = str.indexOf(".") + 1;
            trim = str.substring(dotPos, dotPos + length);
            if (trim == "") {
                return 0;
            }
            return parseInt(trim);
        }

        if (str.indexOf(".") < 0) {
            return 0;
        }
    }

    function getKopecks(summ) {
        var dec = getFrac(summ, 2);
        return fullFill(dec);
    }

    function getRoubles(summ) {
        return parseInt(summ);
    }

    /**
     * 6=>60, ''=>00
     * @returns String
     */
    function fullFill(number) {
        switch ('undefined' === typeof(number)) {
            case true:
                return '00';
                break;
            case false:
                var str = String(number);
                break;
        }

        switch (str.length) {
            case 0:
                return '00';
                break;
            case 1:
                return str + "0";
                break;
            default:
                return str;
                break;
        }
    }

    function extractNds(number, tax) {
        if (number == "" || isNaN(number)) {
            return 0;
        }

        var full = parseFloat(number);
        return -((full / (1 + tax / 100)) - full);
    }

    function addNds(number, tax) {
        if (number == "" || isNaN(number)) {
            return 0;
        }
        (tax === undefined ? tax = 18 : "")
        var full = parseFloat(number);
        var nds = full * (1 + tax / 100);
        return nds;
    }
}

{//events-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
    function summInputEvent(type) {
        clearButtons();

        switch (type) {
            case c_withNds:
                noNdsInput.removeClass('summ-input-active');
                withNdsInput.addClass('summ-input-active');
                lastInput = type;
                ndsInputEvent();
                break;
            case c_noNds:
                noNdsInput.addClass('summ-input-active');
                withNdsInput.removeClass('summ-input-active');
                lastInput = type;
                noNdsInputEvent();
                break;
        }
    }

    function taxInputEvent() {
        switch (lastInput) {
            case c_withNds:
                ndsInputEvent();

                break;
            case c_noNds:
                noNdsInputEvent();

                break;
            default:
                return;
                break;
        }
    }

    function ndsInputEvent() {
        var input = withNdsInput.val();

        var cleared = clearNum(input);
        var withNds = trimFrac(cleared, 2);

        $("#withNds__frac").text(".." + example(cleared));
        var frac = String(getFrac(cleared));

        if (frac.length <= 2) {
            withNdsPopup.hide();
        }
        if (frac.length > 2) {
            withNdsPopup.show()
        }

        var r = getRoubles(withNds);
        var k = getKopecks(withNds);
        var nds = extractNds(withNds, taxInput.val());
        noNdsInput.val((withNds - nds).toFixed(2));
        var ndsr = getRoubles(nds);
        var ndsk = getKopecks(nds.toFixed(2));
        fillTextAreas(r, k, ndsr, ndsk);
    }

    function noNdsInputEvent() {
        var number = noNdsInput.val();

        var input = clearNum(number);

        $("#noNds__frac").text(".." + example(input));
        var frac = String(getFrac(input));
        if (frac.length <= 2) {
            noNdsPopup.hide();
        }
        if (frac.length > 2) {
            noNdsPopup.show();
        }

        var fixed = trimFrac(input, 2);
        var summ = addNds(fixed, taxInput.val());
        withNdsInput.val(summ.toFixed(2));
        var r = parseInt(summ);
        var k = getFrac(summ.toFixed(2), 2);
        var nds = summ - input;
        console.log(summ);
        console.log(input);
        var ndsr = getRoubles(nds);
        var ndsk = getKopecks(nds.toFixed(2));
        fillTextAreas(r, k, ndsr, ndsk)
    }

    function fillTextAreas(r, k, ndsr, ndsk) {
        var tax = taxInput.val();


        $("#clipboard_text1").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1]));
        $("#clipboard_text2").val(numToText(r, 0, "text", money[0]) + fullFill(k) + " " + money[1][getCase(k)]);
        $("#clipboard_text3").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1])
            + ", в т.ч. НДС(" + tax + "%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб.");

        $("#clipboard_text4").val(numToText(r, 0, "text", money[0]) + numToText(k, 1, "text", money[1])
            + ", в т.ч. НДС(" + tax + "%) " + triple(ndsr) + "." + fullFill(ndsk) + " руб. ("
            + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");

        $("#clipboard_text5").val(triple(r) + "." + fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0])
            + numToText(k, 1, "text", money[1]) + "), в т.ч. НДС(" + tax + "%) " + triple(ndsr) + "." + fullFill(ndsk)
            + " руб. (" + numToText(ndsr, 0, "text", money[0]) + numToText(ndsk, 1, "text", money[1]) + ")");

        $("#clipboard_text6").val(triple(r) + "." + fullFill(k) + " руб. (" + numToText(r, 0, "text", money[0])
            + fullFill(k) + " " + money[1][getCase(k)] + ", в т.ч. НДС(" + tax + "%) " + triple(ndsr) + "." + fullFill(ndsk)
            + " руб. " + numToText(ndsr, 0, "text", money[0]) + fullFill(ndsk) + " " + money[1][getCase(ndsk)] + ")");
    }

    function rememberTaxBoxEvent() {
        switch (rememberTax.prop('checked')){
            case true:
                $.cookie('user_tax', parseInt(taxInput.val()));
                break;
            case false:
                $.removeCookie('user_tax'); // => true
                break;
        }
    }

    function ignition() {
        if(undefined == $.cookie('user_tax')){
            return;
        }

        taxInput.val($.cookie('user_tax'));
        rememberTax.attr('checked', true);
    }
}

/**
 * not deprecated!
 * calls from loop in index.php
 * @param id
 */
function copySuccess(id) {
    for (i = 1; i <= 6; i++) {
        var fa = $("#fa" + i);
        $("#copybutton" + i + "-text").text("Скопировать");
        fa.removeClass("fa-clipboard");
        fa.removeClass("fa-files-o");
        fa.addClass("fa-files-o");
    }
    $("#copybutton" + id + "-text").text("Сделано!");
    $("#fa" + id).removeClass("fa-files-o");
    $("#fa" + id).addClass("fa-clipboard");

}

function clearButtons() {
    $(".popup").hide();
    for (i = 1; i <= 6; i++) {
        var fa = $("#fa" + i);
        $("#copybutton" + i + "-text").text("Скопировать");
        fa.removeClass("fa-clipboard");
        fa.removeClass("fa-files-o");
        fa.addClass("fa-files-o");
    }
}

function withNdsFix() {
    var input = withNdsInput.val();
    var score = clearNum(input);
    withNdsInput.val(score.toFixed(2));
    summInputEvent(lastInput);
}

function noNdsFix() {
    var input = noNdsInput.val();
    var score = clearNum(input);
    noNdsInput.val(score.toFixed(2));
    summInputEvent(lastInput);
}

$(document).ready(function () {
    ignition();
});