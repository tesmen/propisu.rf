<!DOCTYPE html>

<?php
//header("location: shutdown.php");
include "phrazer.php";
?>
<head xmlns="http://www.w3.org/1999/html">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords"
          content="прописью, калькулятор ндс−онлайн,начислить ндс, ндс калькулятор онлайн, ндс онлайн−калькулятор,
           ндс от суммы, ндс прописью, онлайн прописью, расчет ндс, сумма прописью, цифры прописью, число прописью"/>
    <title>Прописью.РФ - Онлайн сервис помощи бухгалтерам и сотрудникам договорных отделов</title>

    <link rel="canonical" href="http://прописью.рф/"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/speller.js"></script>
    <script type="text/javascript" src="ZeroClipboard.js"></script>
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
    <script type="text/javascript">VK.init({apiId: 4886226, onlyWidgets: true});</script>
</head>

<html>
<body>

<div class="wrapper">
    <div class="rollover">
        <div class="favorite">Добавьте в закладки <br> нажмите Ctrl + D</div>
        <i class="fa fa-bookmark fa-5x"></i>
    </div>

    <div class="header">
        <a href="http://прописью.рф/" title="Нажмите - будет другая фразочка...">
            <img src="logo.png"/>

            <div class="title">
                <span class="site__title"> ПРОПИСЬЮ.РФ</span><br>
                <span class="site__description"><?= $slogan ?></span>
            </div>
        </a>
    </div>

    <div class="input-group">
        <div class="input__container">
            <div id="withNds__popup" style="display: none">
                Значение после второго десятичного знака будет проигнорировано.
                <span class="popup__frac" id="withNds__frac" onclick="withNdsFix()">Округлить?</span>
            </div>
            <div class="site__description">Сумма с НДС</div>
            <input id="nds-in" oninput="publishExtractNds(this.value)">
        </div>

        <div class="input__container">
            <div id="withOutNds__popup" style="display: none">
                Значение после второго десятичного знака будет проигнорировано.
                <span class="popup__frac" id="withOutNds__frac" onclick="withOutNdsFix()">Округлить?</span>
            </div>
            <div class="site__description">Сумма без НДС</div>
            <input id="no-nds-in" oninput="publishAddNds(this.value)">
        </div>
    </div>

    <div class="content">

        <div class="left__cell" style="vertical-align: bottom">
            <textarea class="output" id="clipboard_text1"></textarea>
            <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copy-button">
                <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
            </button>
        </div>
        <div class="left__cell" style="vertical-align: bottom">
            <textarea class="output" id="clipboard_text1"></textarea>
            <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copy-button">
                <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
            </button>
        </div>
        <div class="left__cell" style="vertical-align: bottom">
            <textarea class="output" id="clipboard_text1"></textarea>
            <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copy-button">
                <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
            </button>
        </div>
        <div class="left__cell" style="vertical-align: bottom">
            <textarea class="output" id="clipboard_text1"></textarea>
            <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copy-button">
                <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
            </button>
        </div>
        <div class="left__cell" style="vertical-align: bottom">
            <textarea class="output" id="clipboard_text1"></textarea>
            <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copy-button">
                <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
            </button>
        </div>
        <div class="left__cell" style="vertical-align: bottom">
            <textarea class="output" id="clipboard_text1"></textarea>
            <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copy-button">
                <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
            </button>
        </div>

    </div>

    <div class="footer">
        <a href="http://tesmen.co/">
            <p class="footer__text">Tesmen.co &nbsp 2015</p>
        </a>
    </div>

</div>

</body>
</html>
