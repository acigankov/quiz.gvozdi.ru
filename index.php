<?php include_once 'config/config.php'; ?>
<!DOCTYPE html >
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="<?= $data['head_keywords']; ?>" />
        <meta name="description" content="<?= $data['head_description']; ?>" />
        <meta name="yandex-verification" content="c5f4e63d0f0a81db" />
        <meta property="og:title" content="<?= $data['site_title']; ?>">
        <meta property="og:site_name" content="<?= $data['site_title']; ?>">
        <meta property="og:url" content="<?= $data['site_url']; ?>">
        <meta property="og:description" content="<?= $data['head_description']; ?>">
        <meta property="og:image" content="http://quiz.gvozdimoscow.ru/img/og_logo.png">
        <meta property="og:type" content="website"> 

        <!--Bootstrap-->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Font-Awesome Css -->
        <link rel="stylesheet" href="/libs/fontawesome/css/all.css">
        <!--Fancybox css-->
        <link rel="stylesheet" href="libs/fancybox/jquery.fancybox.min.css" />
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
        <!--button CALL--> 
        <div class="pulse d-none d-md-block"  data-toggle="modal" data-target="#modal_call" 
              data-placement="left" title="Хотите, мы Вам перезвоним?">
            <i class="fa fa-phone" aria-hidden="true"></i>
        </div>
        <a class="pulse d-block d-md-none" href="tel:+7(495)58-58-203"><i class="fa fa-phone" aria-hidden="true"></i></a>
        
        <!--конец button CALL-->
        
        <!--header Start-->
        <header>
            <div class="container">
                <div class="row">
                    <nav class="top-line w-100 navbar navbar-expand-lg navbar-light">
                        <div class="logo ">
                            <a href="<?= $data['site_url']; ?>" title="logo">
                                <img class="img-fluid" src="img/logo.png" alt="logo">
                            </a>
                            <div class="logo__text">
                                <div class="logo__r1">гвоздатый</div>
                                <div class="logo__r2">квиз</div>
                            </div> 
                        </div>
                        <div class="top-line__soc d-none d-md-flex d-lg-flex ml-5">
                            <a href="https://vk.com/gvozdiquiz" target="_blank" title="Мы Вконтакте">
                                <img src="img/icons/icon-vk.png" alt="Мы Вконтакте" />
                            </a>
                            <a href="https://www.facebook.com/gvozdiquiz" target="_blank" title="Мы в Фейсбук">
                                <img src="img/icons/icon-fb.png" alt="Мы в Фейсбук" />
                            </a>
                            <a href="https://www.instagram.com/gvozdiquiz/" target="_blank" title="Мы в Инстраграм">
                                <img src="img/icons/icon-instagram.png" alt="Мы в Инстраграм" />
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
                <div class="row">
                    <div class="top-heading w-100">
                        <div id="top-heading__slider" class="carousel slide h100 w-100" data-ride="carousel">
                            <div class="carousel-inner">
                                
                                <div class="carousel-item active" >
                                        <div class="top-heading__wrapper position-relative w-100 h-100 d-flex align-items-center justify-content-center flex-column">
                                            <div class="top-heading__slider-text text-center">
                                                <h1>гвоздатый <span>квиз</span></h1>
                                            </div>
                                            
                                            <a class="top-heading__btn btn text-uppercase c-yellow anchor__link" href="#timetable_anchor">записаться на игру</a>
                                        </div>
                                    </div>
                                <?php if($games): ?>
                                    <?php foreach ($games as $game): ?>
                                        <div class="carousel-item" >
                                            <div style="background: url(<?= $game['banner']; ?>) #222 center center / cover;" class="top-heading__wrapper position-relative w-100 h-100 d-flex align-items-center justify-content-center flex-column">
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
                                                <a class="top-heading__btn btn text-uppercase c-yellow anchor__link" href="#timetable_anchor">записаться на игру</a>
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
        <!--section how start-->
        <section class="how">
            <div class="container">
                <div class="row">
                    <div class="how__title section-title">
                        <h2>как проходит игра</h2>
                    </div>
                </div>
                <div class="how__content w-100">
                    <div class="row m-0 p-0">
                        <div class="how__item text-center text-uppercase col-lg-4 col-md-6 col-sm-12 ">
                            <img src="img/icons/how_people.png" alt="" class="img-fluid" />
                            <hr>
                            <span>команды от 2 до 10 человек</span>
                        </div>
                        <div class="how__item text-center text-uppercase col-lg-4 col-md-6 col-sm-12 ">
                            <img src="img/icons/how_50.png" alt="" class="img-fluid" />
                            <hr>
                            <span>мозгодробных вопросов</span>
                        </div>
                        <div class="how__item text-center text-uppercase col-lg-4 col-md-6 col-sm-12 ">
                            <img src="img/icons/how_money.png" alt="" class="img-fluid" />
                            <hr>
                            <span>денежные призы победителям</span>
                        </div>
                        <div class="how__item text-center text-uppercase col-lg-4 col-md-6 col-sm-12 ">
                            <img src="img/icons/how_food.png" alt="" class="img-fluid" />
                            <hr>
                            <span>вкусно поесть и выпить</span>
                        </div>
                        <div class="how__item text-center text-uppercase col-lg-4 col-md-6 col-sm-12 ">
                            <img src="img/icons/how_ticket.png" alt="" class="img-fluid" />
                            <hr>
                            <span>500р с участника <span style="color:#FCC601">наличными</span></span>
                        </div>
                        <div class="how__item text-center text-uppercase col-lg-4 col-md-6 col-sm-12 ">
                            <img src="img/icons/how_time.png" alt="" class="img-fluid" />
                            <hr>
                            <span>2.5 часа время игры</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section how end-->
        
        <!--section advantage start-->
        <section class="advantage">
            <div class="container">
                <div class="row">
                    <div class="advantage__title section-title">
                        <h2>наши преимущества</h2>
                    </div>
                    <div class="advanage__content w-100">
                        <div class="advantage-item d-flex align-items-center">
                            <div class="advantage-item__badge">1</div>
                            <span class="advantage-item__text">
                                Только у нас разыгрываются реальные денежные призы для победителей и призеров!
                            </span>
                        </div>
                        <div class="advantage-item d-flex align-items-center">
                            <div class="advantage-item__badge">2</div>
                            <span class="advantage-item__text">
                                Только у нас самые демократичные цены на еду и напитки.
                            </span>
                        </div>
                        <div class="advantage-item d-flex align-items-center">
                            <div class="advantage-item__badge">3</div>
                            <span class="advantage-item__text">
                                Чем больше команд, тем больше призовой фонд!
                            </span>
                        </div>
                        <div class="advantage-item d-flex align-items-center">
                            <div class="advantage-item__badge">4</div>
                            <span class="advantage-item__text">
                                Только у нас шоу-программа с косплеерами и фотозонами
                            </span>
                        </div>
                        <div class="advantage-item d-flex align-items-center">
                            <div class="advantage-item__badge">5</div>
                            <span class="advantage-item__text">
                                ДА МЫ ВООБЩЕ ОГВОЗДЕННЫЕ! Приходи и убедись!
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section advantage end-->

        <!--section timetable start-->
        <section class="timetable">
            <div class="container">
                <div class="row">
                    <div class="timetable__title section-title" id="timetable_anchor">
                        <h2>игры</h2>
                    </div>
                </div>
                <div class="timetable__content  w-100">
                    <div class="row">
                        <?php if($games) : ?>
                            <?php foreach ($games as $game) : ?>
                                <div class="timetable-item flex-column col-md-4 col-12">
                                    <img src="<?= $game['logo']; ?>" class="img-fluid" alt="<?= $game['name']; ?>">
                                    <div class="timetable-item__title text-uppercase py-3">
                                        <h3><?= $game['name']; ?></h3>
                                    </div>
                                    <div class="timetable-item__date py-2">
                                        <?=
                                        date("d ", strtotime($game['date']))
                                        . getMonthRus(date("n", strtotime($game['date'])))
                                        . date(" Y", strtotime($game['date']));
                                        ?>
                                    </div>
                                    <div class="timetable-item__time py-1">
                                        <?= date("H:i", strtotime($game['date'])); ?>
                                    </div>
                                    <div class="timetable-item__description px-3 px-lg-5 mb-lg-5 mb-3">
                                        <?= $game['adress']; ?>
                                        <?= $game['bar']; ?>
                                    </div>
                                    <button class="timetable-item__btn btn " type="button" data-season_id="<?= $game['season_id']; ?>" data-toggle="modal" data-target="#modal_reg">записаться на игру</button>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
                <div class="timetable-more row justify-content-between align-items-center py-3 px-3 px-md-5"> 
                    <button class="timetable-more__btn btn" data-toggle="collapse" id="btn_timetable" 
                       data-target="#gamestable"
                       type="button">
                        больше игр <i class="fa fa-chevron-down"></i>
                    </button>
                    <button class="timetable-more__btn btn" data-toggle="collapse" id="btn_resulttable" 
                       data-target="#resulttable"
                       type="button">
                        итоги игр <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>    
        </section>
        <!--section timetable end-->
        
        
        <!--section gamestable start -->
        <section class="gamestable container collapse" id="gamestable">
            <div class="row">
                <div class="gamestable-content w-100">
                    <h2 class="py-3"> Расписание игр </h2>
                    <table>
                        <tbody>
                            <tr>
                                <?php if($allGames) : ?>
                            <?php foreach ($allGames as $game) : ?>
                                <td><?= $game['name']; ?>  #<?= $game['description']; ?></td>
                                <td><?= date("d.m.Y", strtotime($game['date'])); ?> <?= date("H:i", strtotime($game['date'])); ?></td>
                                <td><button class="gamestable-content__btn btn " type="button" 
                                            data-season_id="<?= $game['season_id']; ?>" 
                                            data-game_id="<?= $game['id']; ?>" 
                                            data-toggle="modal" data-target="#modal_reg">
                                        записаться
                                    </button>
                                </td>
                            </tr> 
                            <?php endforeach ?>
                            <?php else : ?>
                                <h3>активных игр нет</h3>
                            <?php endif ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </section>
        <!--section gamestable table <end-->

        <!--section resulttable start-->

        <section class="resulttable container collapse" id="resulttable">
            <div class="row">
                <div class="gamestable-content w-100">
                    <h2 class="py-3"> <?= $gameResults[0]['game'] ?> сезон #<?= $gameResults[0]['description'] ?></h2>
                    <table>
                        <tbody>
                            <tr>
                                <?php if (!empty($gameResults)) : ?>
                                    <?php foreach ($gameResults as $gameResult) : ?>
                                        <td><?= $gameResult['name']; ?> </td>
                                        <td><?= $gameResult['points']; ?> </td>
                                        <td><?= $gameResult['position']; ?> </td>
                                    </tr> 
                                <?php endforeach ?>
                            <?php else : ?>
                            <h3>активных игр нет</h3>
                        <?php endif ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </section>
        <!--section resulttable end-->
        
        <!--section news start-->
        <section class="news ">
            <div class="container">
                <div class="row">
                    <div class="news__title section-title bgr-yellow">
                        <h2>Новости</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="news-block">
                        <div class="news-text">
                        <h3 class="text-uppercase py-3"><?= $news[0]['title']; ?></h3>
                            <?= $news[0]['small_text']; ?>
                        </div>
                        <a href="" class="news-block__readmore" data-toggle="modal" data-target="#modal_news">Читать полностью <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!--section news end-->
        
        <!--section foto start-->
        <section class="foto">
            <div class="container">
                <div class="row">
                    <div class="foto__title section-title bgr-yellow">
                        <h2>фотоотчет</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="foto-content w100 d-flex flex-wrap">
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/1.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/1.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/2.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/2.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/3.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/3.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/4.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/4.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/5.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/5.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/6.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/6.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/7.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/7.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                        <div class="foto-content__item">
                            <a href="img/gallery/marvel-01-06-2019/8.jpg" data-fancybox="Фото ГарриПоттер #1.1" data-caption="Фото ГарриПоттер #1.1">
                                <img src="img/gallery/marvel-01-06-2019/8.jpg" alt="Фото" title="Гвозди Паб" class="img-fluid">
                            </a>
                        </div>        
                    </div>
                </div>
                <div class="row bgr-yellow justify-content-end">
                    <div class="foto__link">
                        <a href="https://vk.com/albums-180891332" title="все фото" target="_blank">Больше фото <i class="fas fa-chevron-right"></i></a>
                    </div>   
                </div>
            </div>
        </section>
        <!--section foto end-->

        <!--section team start-->
        <section class="team">
            <div class="container">
                <div class="row">
                    <div class="team__title section-title">
                        <h2>наша команда</h2>
                    </div>
                </div>
                <div class="team__content row">
                    <div class="team-item col-12 col-md-3 col-sm-6">
                        <div class="team-item__img">
                            <img src="img/team/1.jpg" alt="foto" class="img-fluid img-hover-yellow" />
                        </div>
                        <div class="team-item__name">Антон Skorob</div>
                        <div class="team-item__text">Ведущий </div>
                    </div>
                    <div class="team-item col-12 col-md-3 col-sm-6">
                        <div class="team-item__img">
                            <img src="img/team/2.jpg" alt="foto" class="img-fluid img-hover-yellow" />
                        </div>
                        <div class="team-item__name">Василий</div>
                        <div class="team-item__text">Организатор </div>
                    </div>
                    <div class="team-item col-12 col-md-3 col-sm-6">
                        <div class="team-item__img">
                            <img src="img/team/3.jpg" alt="foto" class="img-fluid img-hover-yellow" />
                        </div>
                        <div class="team-item__name">Мария</div>
                        <div class="team-item__text">Администратор </div>
                    </div>
                    <div class="team-item col-12 col-md-3 col-sm-6">
                        <div class="team-item__img">
                            <img src="img/team/4.jpg" alt="foto" class="img-fluid img-hover-yellow" />
                        </div>
                        <div class="team-item__name">Олег</div>
                        <div class="team-item__text">Редактор </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section team end-->

        <!--section where start-->
        <section class="where">
            <div class="container">
                <div class="row">
                    <div class="where__title section-title bgr-yellow" id="quiz_rules_anchor">
                        <h2>как проходят игры</h2>
                    </div>
                </div>
                <div class="where__content row">
                    <div class="where__heading">
                        <h3>Правила</h3>
                    </div>
                    <div class="where__text">
                        <p>
                            Гвоздатый Квиз – это командная интеллектуальная игра, победить в которой 
                            помогут сообразительность, логика и эрудиция. В нашем Квизе команды от 2 до 10 
                            человек сражаются между собой за право выиграть денежные призы. Игры проходят 
                            по вечерам в самом лучшем, по нашему скромному мнению, пабе «Гвозди» по адресу: 
                            Москва, Воронцовская ул., д.20. Каждая игра длится 2-2,5 часа и состоит из 5 раундов 
                            по 10 вопросов в каждом. Все вопросы выводятся на экраны и зачитываются ведущим. 
                            Ответы участники команд заносят в специальные бланки. За каждый правильный ответ 
                            команда получает призовые баллы. Призовые выплаты зависят от числа команд, 
                            принимающих участие в игре и составляют до <strong>70 000</strong> рублей. Суммы выигрышей и призовые 
                            места объявляются непосредственно перед началом каждой игры. У нас есть только одно правило: 
                            во время игры нельзя пользоваться гаджетами. Команда, нарушившая данное правило, не принимает участие в общем зачете. 
                            Стоимость участия в игре 500 рублей с каждого участника команды. В случае равенства 
                            баллов победитель или призер определяется по правильным вопросам на ответы по убыванию 
                            от последнего к первому.
                        </p>
                    </div>
                    <div class="where__heading">
                        <h3>FAQ</h3>
                    </div>
                    <div class="where__text">
                        <h4>Какая стоимость участия?</h4>
                        <p>Стоимость билета составляет 500 рублей на каждого участника команды. 
                            Оплата происходит на входе на игру только наличными.
                        </p>
                        <h4>Сколько длится игра?</h4>
                        <p>2 - 2,5 часа. После игры вы можете продолжить веселиться в баре.</p>
                        <h4>Где посмотреть меню бара?</h4>
                        <p>Меню можно посмотреть <a href="http://gvozdimoscow.ru/menu.php">тут</a>.</p>
                        <h4>Во время игры можно заказывать еду и напитки?</h4>
                        <p>Конечно! Официанты всегда готовы помочь с выбором напитков и закусок.</p>
                        <h4>Будут ли перерывы?</h4>
                        <p>Да, будет 3 перерыва по 10 минут.</p>
                        <h4>Когда лучше приходить на игру?</h4>
                        <p>Лучше приходить заранее, за 15-30 минут.</p>
                        <h4>Если часть команды опаздывает, их пустят?</h4>
                        <p>Да, им главное знать название команды, чтобы мы понимали куда их проводить.</p>
                        <h4>Можно ли, чтобы в команде было 9 и больше человек?</h4>
                        <p>В одной команде может быть до 10 человек, при большем количестве мы можем разделить 
                            вас на две команды и посадить рядом.
                        </p>
                        <h4>Что входит в стоимость?</h4>
                        <p>500 рублей - стоимость участия в игре. Еда и напитки заказываются в баре отдельно.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--section where end-->
        
        <!--section contacts start-->
        <section class="contacts">
            <div class="container">
                <div class="row">
                    <div class="conacts-line d-none d-md-flex w-100">
                        <div class="contacts-line__item col-4"></div>
                        <div class="contacts-line__item col-4"></div>
                        <div class="contacts-line__item col-4"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="contacts-title section-title bgr-yellow" id="contacts_anchor">
                        <h2>контакты</h2>
                    </div>
                </div>
                <div class="contacts-content d-flex flex-column align-items-center justify-content-center bgr-yellow row">
                    <img src="img/logo.png" alt="logo" class="logo img-fluid" />
                    <div class="contacts-content__heading text-center text-uppercase">
                        <h3>гвоздатый <span class="d-block">квиз</span></h3>
                    </div>
                    <button class="contacts-content__button btn" type="button" data-toggle="modal" data-target="#modal_call">
                        обратный звонок
                    </button>
                    <a class="contacts-content__button btn anchor__link" href="#timetable_anchor">
                        записаться на игру
                    </a>
                    <div class="contacts-info d-flex flex-column text-center">
                        <span class="contacts-info__title">Адрес:</span>
                        <span class="contacts-info__adress">м. Таганская, Воронцовская ул., д. 20</span>
                        <span class="contacts-info__booking">Бронь столов по телефону: </span>
                        <span class="contacts-info__tel"><a href="tel:+7&nbsp;(495)&nbsp;58-58-203">+7 (495) 58-58-203</a></span>
                    </div>
                    <div class="contacts-info__soc">
                        <a href="https://vk.com/gvozdiquiz" target="_blank" title="Мы Вконтакте"><i class="fab fa-vk"></i></a>
                        <a href="https://www.facebook.com/gvozdiquiz" target="_blank" title="Мы в Фейсбук"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/gvozdiquiz/" target="_blank" title="Мы в Инстраграм"><i class="fab fa-instagram"></i></a>
                    </div>

                    <a href="img/gallery/fasad.jpg" data-fancybox="Гвозди Паб" data-caption="Гвозди Паб">
                        <img src="img/gallery/fasad.jpg" alt="Гвозди Паб" title="Гвозди Паб" class="img-fluid">
                    </a>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3777.6126822325623!2d37.65681684109336!3d55.737967713856634!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54ae77f997671%3A0x543257eb3ab95a90!2z0JLQvtGA0L7QvdGG0L7QstGB0LrQsNGPINGD0LsuLCAyMCwg0JzQvtGB0LrQstCwLCAxMDkxNDc!5e0!3m2!1sru!2sru!4v1551736577710" ></iframe>  
                </div>

            </div>
        </section>
        <!--section contacts end-->

        <!--footer start-->
        <footer>
            <div class="container">
                <div class="footer-line w-100 d-flex align-items-center justify-content-between">
                    <div class="logo ">
                        <a href="<?= $data['site_url']; ?>" title="logo">
                            <img class="img-fluid" src="img/logo.png" alt="logo">
                        </a>
                        <div class="logo__text">
                            <div class="logo__r1">гвоздатый</div>
                            <div class="logo__r2">квиз</div>
                        </div>   
                    </div>
                    <div class="top-line__soc d-none d-md-flex d-lg-flex ml-5">
                        <a href="https://vk.com/gvozdiquiz" target="_blank" title="Мы Вконтакте">
                            <img src="img/icons/icon-vk.png" alt="Мы Вконтакте" />
                        </a>
                        <a href="https://www.facebook.com/gvozdiquiz" target="_blank" title="Мы в Фейсбук">
                            <img src="img/icons/icon-fb.png" alt="Мы в Фейсбук" />
                        </a>
                        <a href="https://www.instagram.com/gvozdiquiz/" target="_blank" title="Мы в Инстраграм">
                            <img src="img/icons/icon-instagram.png" alt="Мы в Инстраграм" />
                        </a>
                    </div>
                    <a class="footer__link" href="#" data-toggle="modal" data-target="#modal_oferta">Пользовательское соглашение</a>

                </div>
            </div>
        </footer>
        <!--footer end-->

        <!--modals-->
        <?php include_once 'template/modal_oferta.php'; ?>    
        <?php include_once 'template/modal_call.php'; ?>    
        <?php include_once 'template/modal_reg.php'; ?>    
        <?php include_once 'template/modal_news.php'; ?>    

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
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

           ym(52730683, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/52730683" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    </body>
</html>
