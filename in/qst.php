<?php
include_once '../config/config.php';

if (isset($_GET['qstnum']) && isset($_GET['gameid']) && isset($_GET['teamid']) && isset($_GET['tt'])) {

    $qstnum = $_GET['qstnum'];
    $gameid = $_GET['gameid'];
    $teamid = $_GET['teamid'];
    $team_token = $_GET['tt'];

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

    $answer = $_POST['answer'];
    
    if (!checkTeamAnswer($qstnum, $gameid, $teamid, $team_token)) {

        if (saveAnswer($qstnum, $gameid, $teamid, $team_token, $answer)) {

            $message = "Спасибо за ответ, команда №_$teamid . Ожидайте следующего письма.";
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
                                <?php if($games): ?>
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
                                                    <span><?= getDayRus(date("w", strtotime($game['date'])));?></span>
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
                    <div class="section-title">
                        <h2>Дополнительный вопрос</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="qst__content w-100 h-100 p-3" style="min-height:30vh">

                        <?php if (isset($message)) : ?>
                            <h3><?= $message ?></h3>
                        <?php else : ?>

                            <?php if (!$link_validated) : ?>    
                                <p>Cсылка недействительна 🤷‍♂ </p>

                            <?php elseif ($link_answered) : ?>
                                <p>Ваша команда уже ответила на вопрос! </p>
                                
                                <form action="" method="POST" name="qst_form">
                                    <div class="form-group col-md-4">
                                        <label for="qst_form"><strong>Есть ли жизнь на марсе?</strong></label>
                                        <select class="form-control" id="qst_form" name="answer">
                                            <option value="0">Да</option>
                                            <option value="1">Нет</option>
                                            <option value="2">Я еще не определился</option>
                                        </select>
                                    </div>
                                </form>

                            <?php elseif ($link_validated && !$link_answered) : ?> 
                                <p>Привет, команда такая то! Вы пришли сюда, чтобы отвтеить на серию дополнительных вопросов!</p>
                                <p>У Вас есть только одна попытка ответа, поэтому не торопитесь, подумайте, можете 
                                    отправить ссылку данной страницы  другим участникам команды.
                                </p>

                                <form action="" method="POST" name="qst_form">
                                    <div class="form-group col-md-4">
                                        <label for="qst_form"><strong>Есть ли жизнь на марсе?</strong></label>
                                        <select class="form-control" id="qst_form" name="answer">
                                            <option value="0">Да</option>
                                            <option value="1">Нет</option>
                                            <option value="2">Я еще не определился</option>
                                        </select>
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


        </script>
    </body>
</html>