<?php include_once '../config/config.php'; ?>
<!DOCTYPE html >
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="<?= $data['head_keywords']; ?>" />
        <meta name="description" content="<?= $data['head_description']; ?>" />

        <!--Bootstrap-->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Font-Awesome Css -->
        <link rel="stylesheet" href="/libs/fontawesome/css/all.css">
        <!--Fancybox css-->
        <link rel="stylesheet" href="/libs/fancybox/jquery.fancybox.min.css" />
        <!-- Animate Css-->
        <link rel="stylesheet" href="/css/animate.css" />
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
        <!--button UP-->
        <div id="button-up" class="animated fadeInRightBig"><i class="fas fa-arrow-up"></i></div>
        <!--конец button UP-->
        <!--header Start-->
        <header>
            <div class="container">
                <div class="row">
                    <nav class="top-line w-100 navbar navbar-expand-lg navbar-light">
                        <div class="logo ">
                            <a href="<?= $data['site_url']; ?>" title="logo">
                                <img class="img-fluid" src="/img/logo.png" alt="logo">
                            </a>
                        </div>
                        <div class="top-line__soc d-none d-md-flex d-lg-flex ml-5">
                            <a href="https://vk.com/gvozdipub_moscow" target="_blank" title="Мы Вконтакте">
                                <img src="/img/icons/icon-vk.png" alt="Мы Вконтакте" />
                            </a>
                            <a href="https://ru-ru.facebook.com/gvozdipubmoscow/" target="_blank" title="Мы в Фейсбук">
                                <img src="/img/icons/icon-fb.png" alt="Мы в Фейсбук" />
                            </a>
                            <a href="https://www.instagram.com/gvozdipub_moscow/" target="_blank" title="Мы в Инстраграм">
                                <img src="/img/icons/icon-instagram.png" alt="Мы в Инстраграм" />
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop" aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation-Top">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarTop">
                            <div class="navbar-nav text-right top-line___nav">
                                <a class="nav-item nav-link anchor__link" href="#timetable_anchor">Расписание<span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link anchor__link" href="#quiz_rules_anchor">Правила</a>
                                <a class="nav-item nav-link anchor__link" href="#contacts_anchor">Контакты</a>
                                <a class="nav-item nav-link" href="http://gvozdimoscow.ru/" target="_blank">Меню</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        asdadsa
        <!--footer start-->
        <footer>
            <div class="container">
                <div class="footer-line w-100 d-flex align-items-center justify-content-between">
                    <div class="logo ">
                        <a href="<?= $data['site_url']; ?>" title="logo">
                            <img class="img-fluid" src="/img/logo.png" alt="logo">
                        </a>
                        <div class="logo__text">
                            <div class="logo__r1">гвоздатый</div>
                            <div class="logo__r2">квиз</div>
                        </div>   
                    </div>
                    <div class="top-line__soc d-none d-md-flex d-lg-flex ml-5">
                        <a href="https://vk.com/gvozdipub_moscow" target="_blank" title="Мы Вконтакте">
                            <img src="/img/icons/icon-vk.png" alt="Мы Вконтакте" />
                        </a>
                        <a href="https://ru-ru.facebook.com/gvozdipubmoscow/" target="_blank" title="Мы в Фейсбук">
                            <img src="/img/icons/icon-fb.png" alt="Мы в Фейсбук" />
                        </a>
                        <a href="https://www.instagram.com/gvozdipub_moscow/" target="_blank" title="Мы в Инстраграм">
                            <img src="/img/icons/icon-instagram.png" alt="Мы в Инстраграм" />
                        </a>
                    </div>
                    <a class="footer__link" href="#" data-toggle="modal" data-target="#modal_oferta">Пользовательское соглашение</a>
                </div>
            </div>
        </footer>
        <!--footer end-->

        <!--modals-->
        <?php include_once 'modal_oferta.php'; ?>    

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <!-- Fancybox -->
        <script  src="/libs/fancybox/jquery.fancybox.min.js"></script>
        <!--Custom JS for additional--> 
        <script src="../js/custom.js"></script> 
    </body>
</html>
