<!DOCTYPE html>

<?
//header("location: shutdown.php");
include "phrazer.php";
?>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" itemprop="keywords"
          content="прописью, калькулятор ндс−онлайн,начислить ндс, ндс калькулятор онлайн, ндс онлайн−калькулятор, ндс от суммы, ндс прописью, онлайн прописью, расчет ндс, сумма прописью, цифры прописью, число прописью"/>
    <title>Прописью.РФ - Онлайн сервис помощи бухгалтерам и сотрудникам договорных отделов</title>
    <link rel="canonical" href="http://прописью.рф/"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/speller.js"></script>
    <script type="text/javascript" src="ZeroClipboard.js"></script>

    <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
    <script type="text/javascript">        VK.init({apiId: 4886226, onlyWidgets: true});    </script>

</head>
<body>
<div class="wrapper">
    <div class="rollover">
        <div class="favorite">Добавьте в закладки <br> нажмите Ctrl + D</div>
        <i class="fa fa-bookmark fa-5x"></i>
    </div>

    <section class="header">
        <a href="http://прописью.рф/" title="Нажмите - будет другая фразочка...">
            <img src="logo.png"/>

            <div class="title">
                <span class="site__title"> ПРОПИСЬЮ.РФ</span><br>
                <span class="site__description"><?= $slogan ?></span>
            </div>
        </a>
    </section>

    <div class="input__container">
        <div id="withNds__popup" class="is__none popup">Значение после второго десятичного знака будет проигнорировано.
            Округлить?
            <span class="popup__frac" id="withNds__frac" onclick="withNdsFix()"></span>
        </div>
        <span class="site__description">Сумма с НДС</span><br>
        <input type="text" id="withNds" oninput="publishExtractNds(this.value)"/>
    </div>

    <div class="input__container">
        <div id="withOutNds__popup" class="is__none popup">Значение после второго десятичного знака будет
            проигнорировано. Округлить?
            <span class="popup__frac" id="withOutNds__frac" onclick="withOutNdsFix()"></span>
        </div>
        <span class="site__description">Сумма без НДС</span><br>
        <input type="text" id="withOutNds" oninput="publishAddNds(this.value)"/>
    </div>

    <center>
        <table width=100% border=0>
            <tr>
                <td class="left__cell">
                    <textarea noresize class="output" id="clipboard_text1"></textarea>
                </td>
                <td>
                    <button id="copybutton1" data-clipboard-target="clipboard_text1" class="copybutton">
                        <i class="fa fa-files-o fa-2x" id="fa1"></i><br>
                        <span class="copybutton__text" id="copybutton1__text">Скопировать</span>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="left__cell">
                    <textarea noresize class="output" id="clipboard_text2"></textarea>
                </td>
                <td>
                    <button id="copybutton2" data-clipboard-target="clipboard_text2" class="copybutton">
                        <i class="fa fa-files-o fa-2x" id="fa2"></i><br>
                        <span class="copybutton__text" id="copybutton2__text">Скопировать</span>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="left__cell">
                    <textarea noresize class="output" id="clipboard_text3"></textarea>
                </td>
                <td>
                    <button id="copybutton3" data-clipboard-target="clipboard_text3" class="copybutton">
                        <i class="fa fa-files-o fa-2x" id="fa3"></i><br>
                        <span class="copybutton__text" id="copybutton3__text">Скопировать</span>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="left__cell">
                    <textarea noresize class="output" id="clipboard_text4"></textarea>
                </td>
                <td>
                    <button id="copybutton4" data-clipboard-target="clipboard_text4" class="copybutton">
                        <i class="fa fa-files-o fa-2x" id="fa4"></i><br>
                        <span class="copybutton__text" id="copybutton4__text">Скопировать</span>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="left__cell">
                    <textarea noresize class="output" id="clipboard_text5"></textarea>
                </td>
                <td>
                    <button id="copybutton5" data-clipboard-target="clipboard_text5" class="copybutton">
                        <i class="fa fa-files-o fa-2x" id="fa5"></i><br>
                        <span class="copybutton__text" id="copybutton5__text">Скопировать</span>
                    </button>
                </td>
            </tr>

            <tr>
                <td class="left__cell">
                    <textarea noresize class="output" id="clipboard_text6"></textarea>
                </td>
                <td>
                    <button id="copybutton6" data-clipboard-target="clipboard_text6" class="copybutton">
                        <i class="fa fa-files-o fa-2x" id="fa6"></i><br>
                        <span class="copybutton__text" id="copybutton6__text">Скопировать</span>
                    </button>
                </td>
            </tr>
        </table>
    </center>

    <!--    <div id="vk_like" class="vk_like"></div>-->
    <!--    <script type="text/javascript">-->
    <!--        VK.Widgets.Like("vk_like", {type: "button"});-->
    <!--    </script>-->

    <!--    <span class="vk_feedback">Ниже можно оставить замечания и пожелания по работе сервиса. Стена регулярно просматривается.</span>-->

    <!--    <div id="vk_comments"></div>-->
    <!--    <script type="text/javascript">-->
    <!--        VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});-->
    <!--    </script>-->


    <section class="footer">
        <a href="http://tesmen.co/">
            <p class="footer__text">Tesmen.co &nbsp 2015</p>
        </a>

        <div style="display: inline-block; width:75px; height: 15px;"></div>

        <!--        <!-- Yandex.Metrika informer -->
        <!--        <a href="https://metrika.yandex.ru/stat/?id=29676080&amp;from=informer"-->
        <!--           target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/29676080/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"-->
        <!--                                               style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"-->
        <!--                                               title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"-->
        <!--                                               onclick="try{Ya.Metrika.informer({i:this,id:29676080,lang:'ru'});return false}catch(e){}"/></a>-->
        <!--        <!-- /Yandex.Metrika informer -->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter29676080 = new Ya.Metrika({
                            id: 29676080,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true
                        });
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () {
                        n.parentNode.insertBefore(s, n);
                    };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript>
            <div><img src="//mc.yandex.ru/watch/29676080" style="position:absolute; left:-9999px;" alt=""/></div>
        </noscript>
        <!-- /Yandex.Metrika counter -->

    </section>
</div>

<script type="text/javascript" src="js/main.js"></script>
</body>