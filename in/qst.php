<?php
include_once '../config/config.php';

if (isset($_GET['qstnum']) && isset($_GET['gameid']) && isset($_GET['teamid']) && isset($_GET['tt'])) {

    $qstnum = $_GET['qstnum'];
    $gameid = $_GET['gameid'];
    $teamid = $_GET['teamid'];
    $team_token = $_GET['tt'];

    $gameName = getGameNameById($gameid);

    $question = getQuestionByGameid($qstnum, $gameid);

    $teamName = getTeamNameById($teamid);

    if (checkTeamRegistration($gameid, $teamid, $team_token)) {
        $link_validated = true;
    } else {
        $link_validated = false;
    }

    if (checkTeamAnswer($qstnum, $gameid, $teamid, $team_token)) {
        $link_answered = true;
    } else {
        $link_answered = false;
    }
}

if (isset($_POST['qst_submit']) && $_POST['qst_submit'] === 'true') {

    $answer = htmlspecialchars($_POST['answer']);

    if (!checkTeamAnswer($qstnum, $gameid, $teamid, $team_token)) {

        if (saveAnswer($qstnum, $gameid, $teamid, $team_token, $answer)) {

            $message = "Спасибо за ответ, команда $teamName ! Ожидайте следующего письма.";
            unset($_POST);
        } else {

            $message = "Данные не сохранены";
            unset($_POST);
        }
    }
}
?>

<!DOCTYPE html >
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="<?= $data['head_keywords']; ?>" />
        <meta name="description" content="<?= $data['head_description']; ?>" />
        <meta name="yandex-verification" content="c5f4e63d0f0a81db" />

        <!--Bootstrap-->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Font-Awesome Css -->
        <link rel="stylesheet" href="/libs/fontawesome/css/all.css">
        <!--Fancybox css-->
        <link rel="stylesheet" href="libs/fancybox/jquery.fancybox.min.css" />
        <!-- Animate Css-->
        <link rel="stylesheet" href="../css/animate.css" />
        <!-- Main Css -->
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/media.css">
        <link rel="shortcut icon" href="/img/favicon/favicon.png" type="image/png">
        <title><?= $data['site_title']; ?></title>
    </head>
    <body>
        <!--прелоадер-->
        <div id="preloader"><div id="preloader_preload"></div></div>
        <!--конец прелоадер--> 

        <!--header Start-->
        <header>
            <div class="container">
                <div class="row">
                    <nav class="top-line w-100 navbar navbar-expand-lg navbar-light">
                        <div class="logo ">
                            <a href="http://quiz.gvozdimoscow.ru/" title="logo">
                                <img class="img-fluid" src="../img/logo.png" alt="logo">
                            </a>
                            <div class="logo__text">
                                <div class="logo__r1">гвоздатый</div>
                                <div class="logo__r2">квиз</div>
                            </div> 
                        </div>
                        <div class="top-line__soc d-none d-md-flex d-lg-flex ml-5">
                            <a href="https://vk.com/gvozdiquiz" target="_blank" title="Мы Вконтакте">
                                <img src="../img/icons/icon-vk.png" alt="Мы Вконтакте" />
                            </a>
                            <a href="https://www.facebook.com/gvozdiquiz" target="_blank" title="Мы в Фейсбук">
                                <img src="../img/icons/icon-fb.png" alt="Мы в Фейсбук" />
                            </a>
                            <a href="https://www.instagram.com/gvozdiquiz/" target="_blank" title="Мы в Инстраграм">
                                <img src="../img/icons/icon-instagram.png" alt="Мы в Инстраграм" />
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation-Top">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarTop">
                            <div class="navbar-nav text-right top-line___nav">
                                <a class="nav-item nav-link" href="http://gvozdimoscow.ru/" target="_blank">Меню</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="top-heading w-100">
                        <div id="top-heading__slider" class="carousel slide h100 w-100" data-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active" >
                                    <div class="top-heading__wrapper position-relative w-100 h-100 d-flex align-items-center justify-content-center flex-column">
                                        <div class="top-heading__slider-text text-center">
                                            <h1>гвоздатый <span>квиз</span></h1>
                                        </div>

                                    </div>
                                </div>
                                <?php if ($games): ?>
                                    <?php foreach ($games as $game): ?>
                                        <div class="carousel-item" >
                                            <div style="background: url(../<?= $game['banner']; ?>) #222 center center / cover;" class="top-heading__wrapper position-relative w-100 h-100 d-flex align-items-center justify-content-center flex-column">
                                                <div class="top-heading__badge">сезон #<?= $game['description'] ?></div>
                                                <div class="top-heading__slider-text text-center flex-column">

                                                    <span class="top-heading__desc">
                                                        <?=
                                                        date("d ", strtotime($game['date']))
                                                        . getMonthRus(date("n", strtotime($game['date'])))
                                                        . date(" Y", strtotime($game['date']));
                                                        ?></span>
                                                    <span><?= getDayRus(date("w", strtotime($game['date']))); ?></span>
                                                    <div class="top-heading__text text-center text-uppercase">
                                                        <h1><?= $game['name']; ?></h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif ?>

                            </div>
                            <a class="carousel-control-prev" href="#top-heading__slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#top-heading__slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <!--header end-->
        <section class="qst">
            <div class="container bgr-yellow">
                <div class="row">
                    <div class="section-title" style="min-height:80px;">
                        <h2>Бонусный вопрос</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="qst__content w-100 h-100 p-3 text-center" style="min-height:30vh;max-width:500px;margin:0 auto;">

                        <?php if (isset($message)) : ?>
                            <h3><?= $message ?></h3>
                        <?php else : ?>

                            <?php if (!$link_validated || $link_expired) : ?>    
                                <p>Cсылка недействительна 🤷‍♂ </p>

                            <?php elseif ($question['expiry_date'] > date()) : ?>
                                
                                <h3 class="py-5">Время истекло 🤷‍♂ </h3>
                                
                            <?php elseif ($link_answered) : ?>
                                <p>Ваша команда уже ответила на вопрос! </p>
                                <h3 class="py-5">Разгадайте ребус : </h3>
                                <img src="../<?= $question['img'] ?>" alt="вопрос" class="img-fluid">

                            <?php elseif ($link_validated && !$link_answered && !$link_expired) : ?> 

                                <ul class="countdown" style="padding-bottom:2rem;">
                                    <h3 class="py-3">Время на раздумье</h3>
                                    <!--                                    <li>
                                                                            <span class="days">00</span>
                                                                            <div class="days_ref">дни</div>
                                                                        </li>-->
                                    <li class="seperator">.</li>
                                    <li>
                                        <span class="hours">00</span>
                                        <div class="hours_ref">часы</div>
                                    </li>
                                    <li class="seperator">:</li>
                                    <li>
                                        <span class="minutes">00</span>
                                        <div class="minutes_ref">мин</div>
                                    </li>
                                    <li class="seperator">:</li>
                                    <li>
                                        <span class="seconds">00</span>
                                        <div class="seconds_ref">сек</div>
                                    </li>
                                </ul>

                                <p>Привет, <strong><?= $teamName ?></strong> ! Вы пришли сюда, чтобы ответить на серию дополнительных вопросов!</p>
                                <p>У Вас есть только одна попытка , поэтому не торопитесь, подумайте, можете 
                                    отправить ссылку другим участникам команды.
                                </p>
                                <h3 class="py-5">Разгадайте ребус : </h3>
                                <img src="../<?= $question['img'] ?>" alt="вопрос" class="img-fluid py-3">
                                <form action="" method="POST" name="qst_form" class="py-5">
                                    <div class="form-group ">
                                        <input type="text" class="form-control" id="qst_form" name="answer" placeholder="Ваш ответ">
                                        <small id="emailHelp" class="form-text text-muted">У Вас есть только одна попытка</small>
                                    </div>
                                    <button type="submit" name="qst_submit" class="btn btn-primary">Ответить</button>
                                </form>

                            <?php endif ?>
                        <?php endif ?>

                    </div>
                </div>

            </div>
        </section>

        <!--footer start-->
        <footer style="">
            <div class="container">
                <div class="footer-line w-100 d-flex align-items-center justify-content-between">
                    <div class="logo ">
                        <a href="<?= $data['site_url']; ?>" title="logo">
                            <img class="img-fluid" src="../img/logo.png" alt="logo">
                        </a>
                        <div class="logo__text">
                            <div class="logo__r1">гвоздатый</div>
                            <div class="logo__r2">квиз</div>
                        </div>   
                    </div>
                    <div class="top-line__soc d-none d-md-flex d-lg-flex ml-5">
                        <a href="https://vk.com/gvozdiquiz" target="_blank" title="Мы Вконтакте">
                            <img src="../img/icons/icon-vk.png" alt="Мы Вконтакте" />
                        </a>
                        <a href="https://www.facebook.com/gvozdiquiz" target="_blank" title="Мы в Фейсбук">
                            <img src="../img/icons/icon-fb.png" alt="Мы в Фейсбук" />
                        </a>
                        <a href="https://www.instagram.com/gvozdiquiz/" target="_blank" title="Мы в Инстраграм">
                            <img src="../img/icons/icon-instagram.png" alt="Мы в Инстраграм" />
                        </a>
                    </div>
                    <a class="footer__link" href="/template/oferta_page.php" alt="Пользовательское Соглашение">Пользовательское соглашение</a>

                </div>
            </div>
        </footer>
        <!--footer end-->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <!--mask in forms plugin-->
        <script src="/libs/inputmask.js/jquery.inputmask.bundle.js"></script>
        <!-- Fancybox -->
        <script  src="/libs/fancybox/jquery.fancybox.min.js"></script>
        <!--Custom JS for additional--> 
        <script src="/js/custom.js"></script> 
        <script>

            var submit = $('button[name=qst_submit]');
            submit.on('click', function () {
                $(this).val('true');
            });

            (function ($) {

                $.fn.downCount = function (options, callback) {
                    var settings = $.extend({
                        date: null,
                        offset: null
                    }, options);

                    // Throw error if date is not set
                    if (!settings.date) {
                        $.error('Date is not defined.');
                    }

                    // Throw error if date is set incorectly
                    if (!Date.parse(settings.date)) {
                        $.error('Incorrect date format, it should look like this, 12/24/2012 12:00:00.');
                    }

                    // Save container
                    var container = this;

                    /**
                     * Change client's local date to match offset timezone
                     * @return {Object} Fixed Date object.
                     */
                    var currentDate = function () {
                        // get client's current date
                        var date = new Date();

                        // turn date to utc
                        var utc = date.getTime() + (date.getTimezoneOffset());

                        // set new Date object
                        var new_date = new Date(utc + (3600000 * settings.offset))

                        return new_date;
                    };

                    /**
                     * Main downCount function that calculates everything
                     */
                    function countdown() {
                        var target_date = new Date(settings.date), // set target date
                                current_date = currentDate(); // get fixed current date

                        // difference of dates
                        var difference = target_date - current_date;

                        // if difference is negative than it's pass the target date
                        if (difference < 0) {
                            // stop timer
                            clearInterval(interval);

                            if (callback && typeof callback === 'function')
                                callback();

                            return;
                        }

                        // basic math variables
                        var _second = 1000,
                                _minute = _second * 60,
                                _hour = _minute * 60,
                                _day = _hour * 24;

                        // calculate dates
                        var days = Math.floor(difference / _day),
                                hours = Math.floor((difference % _day) / _hour),
                                minutes = Math.floor((difference % _hour) / _minute),
                                seconds = Math.floor((difference % _minute) / _second);

                        // fix dates so that it will show two digets
                        days = (String(days).length >= 2) ? days : '0' + days;
                        hours = (String(hours).length >= 2) ? hours : '0' + hours;
                        minutes = (String(minutes).length >= 2) ? minutes : '0' + minutes;
                        seconds = (String(seconds).length >= 2) ? seconds : '0' + seconds;

                        // based on the date change the refrence wording
                        var ref_days = (days === 1) ? 'дней' : 'дней',
                                ref_hours = (hours === 1) ? 'часов' : 'часов',
                                ref_minutes = (minutes === 1) ? 'минут' : 'минут',
                                ref_seconds = (seconds === 1) ? 'секунд' : 'секунд';

                        // set to DOM
                        container.find('.days').text(days);
                        container.find('.hours').text(hours);
                        container.find('.minutes').text(minutes);
                        container.find('.seconds').text(seconds);

                        container.find('.days_ref').text(ref_days);
                        container.find('.hours_ref').text(ref_hours);
                        container.find('.minutes_ref').text(ref_minutes);
                        container.find('.seconds_ref').text(ref_seconds);
                    }
                    ;

                    // start
                    var interval = setInterval(countdown, 1000);
                };

            })(jQuery);

            var deadline = '2019-05-22 23:59:59';

            $('.countdown').downCount({
                date: deadline,
            },
                    function () {
                        /* действие после завершения таймера */
                    });
        </script>
    </body>
</html>