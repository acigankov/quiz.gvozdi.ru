<?php include_once '../config/config.php'; ?>
<!DOCTYPE html >
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex, nofollow" />
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

        <!--button UP-->
        <div id="button-up" class="animated fadeInRightBig"><i class="fas fa-arrow-up"></i></div>
        <!--конец button UP-->
        <!--header Start-->
        <header>
            <div class="container">
                <div class="row">
                    <nav class="top-line w-100 justify-content-center justify-content-lg-between navbar navbar-expand-lg navbar-light">
                        <div class="logo ">
                            <a href="/" title="logo">
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
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="oferta-body">
                        <hr>
                        <h1 class="text-center text-uppercase py-5">Оферта</h1>
                        <p>
                            Указывая персональные данные на&nbsp;сайте quiz. gvozdimoscow.&nbsp;ru, 
                            (далее&nbsp;&mdash; Сайт) Пользователь выражает свое согласие на&nbsp;обработку, 
                            хранение и&nbsp;использование своих персональных данных на&nbsp;основании ФЗ 
                            &#8470;&nbsp;152-ФЗ &laquo;О&nbsp;персональных данных&raquo; от&nbsp;27.07.2006&nbsp;г.
                        </p>
                        <ul>
                            <li>
                                &mdash;&nbsp;подтверждает, что указанные данные принадлежат лично ему;
                            </li>
                            <li>
                                &mdash;&nbsp;подтверждает, что внимательно и&nbsp;в&nbsp;полном объеме прочитал
                                Соглашение и&nbsp;условия обработки его персональных данных, и&nbsp;что данные условия
                                ему понятны;
                            </li> 
                            <li>
                                &mdash;&nbsp;дает согласие на&nbsp;направление ему sms-сообщений, сообщений в&nbsp;мобильные 
                                приложения и&nbsp;иных форм информации о&nbsp;новостях Сайта, в&nbsp;том числе анонсов игр.
                            </li>
                        </ul>
                        <p>
                            Согласие Пользователя на&nbsp;обработку персональных данных является осознанным.
                            Под персональными данными подразумевается любая информация личного характера, позволяющая 
                            установить личность Пользователя, такая как:
                        </p>
                        <ul><li>&mdash;&nbsp;фамилия, имя, отчество</li>
                            <li>&mdash;&nbsp;год рождения</li>
                            <li>&mdash;&nbsp;места пребывания</li>
                            <li>&mdash;&nbsp;номера телефонов</li>
                            <li>&mdash;&nbsp;адресах электронной почты (E-mail);</li>
                            <li>&mdash;&nbsp;изображения/фотографии с&nbsp;мероприятий.</li>
                        </ul>

                        <p>Персональные данные Пользователей хранятся исключительно на&nbsp;электронных носителях и&nbsp;
                            обрабатываются с&nbsp;использованием автоматизированных систем, за&nbsp;исключением случаев, 
                            когда неавтоматизированная обработка персональных данных необходима в&nbsp;связи с&nbsp;исполнением 
                            требований законодательства.
                            Пользователь предоставляет quiz. gvozdimoscow.&nbsp;ru&nbsp;право осуществлять следующие действия 
                            (операции) с&nbsp;персональными данными: сбор и&nbsp;накопление; хранение в&nbsp;течение установленных 
                            нормативными документами сроков хранения отчетности, но&nbsp;не&nbsp;менее трех лет с&nbsp;момента даты 
                            прекращения пользования услуг Пользователем; уточнение (обновление, изменение); использование; уничтожение; 
                            обезличивание; передача по&nbsp;требованию суда, в&nbsp;т.&nbsp;ч., третьим лицам, с&nbsp;соблюдением мер, 
                            обеспечивающих защиту персональных данных от&nbsp;несанкционированного доступа.
                            Отзыв согласия на&nbsp;обработку персональных данных может быть осуществлен путем направления 
                            Пользователем соответствующего распоряжения в&nbsp;простой письменной форме на&nbsp;адрес электронной 
                            почты gvozdimsk1@gmail. com
                            Сайт не&nbsp;несет ответственности за&nbsp;использование (как правомерное, так и&nbsp;неправомерное) 
                            третьими лицами Информации, размещенной Пользователем на&nbsp;Сайте, включая её&nbsp;воспроизведение 
                            и&nbsp;распространение, осуществленные всеми возможными способами.
                            Сайт имеет право вносить изменения в&nbsp;настоящее Соглашение. Новая редакция Соглашения вступает 
                            в&nbsp;силу с&nbsp;момента ее&nbsp;размещения на&nbsp;Сайте, если иное не&nbsp;предусмотрено новой 
                            редакцией Соглашения.
                        </p>
                        <p>Гвоздатый квиз не&nbsp;является лотереей, как данное определение дано в&nbsp;Федеральном законе 
                            от&nbsp;11.11.2003 &#8470;&nbsp;138-ФЗ &laquo;О&nbsp;лотереях&raquo;, и/или азартной игрой, как 
                            данное определение дано в&nbsp;Федеральном законе от&nbsp;29.12.2006 &#8470;&nbsp;244-ФЗ &laquo;О&nbsp;
                            государственном регулировании деятельности по&nbsp;организации и&nbsp;проведению азартных игр и&nbsp;о&nbsp;
                            внесении изменений в&nbsp;некоторые законодательные акты Российской Федерации&raquo;, и/или стимулирующим 
                            мероприятием, как данное определение дано в&nbsp;Федеральном законе от&nbsp;13.03.2006 &#8470;&nbsp;38-ФЗ
                            &laquo;О&nbsp;рекламе&raquo;.
                        </p>
                        <p>В случае, если одно призовое место заняли несколько команд, набрав равное количество баллов, то 
                            призовой фонд делится пропорционально количеству команд.
                        </p>
                        <p>Награждение Победителей Гвоздатого Квиза осуществляется с&nbsp;учётом настоящих Правил, а&nbsp;также 
                            действующего законодательства Российской Федерации.
                        </p>
                        <p>Гвоздатый Квиз не&nbsp;компенсирует участникам затраты, понесенные всвязи с&nbsp;их&nbsp;участием в&nbsp;Квизе.
                            Само по&nbsp;себе участие в&nbsp;Квизе, не&nbsp;приведшее к&nbsp;достижению победного результата, 
                            не&nbsp;предоставляет никому из&nbsp;Участников возможности и&nbsp;права требовать предоставления наград 
                            от&nbsp;Организатора. 
                        </p>
                        <p>Призовой фонд образуется за&nbsp;счет средств Гвоздатого Квиза, формируется отдельно до&nbsp;проведения 
                            игры и&nbsp;используется исключительно на&nbsp;предоставление призов Победителям. Информация о&nbsp;размере 
                            призового фонда оглашается в&nbsp;день игры непосредственно перед началом мероприятия.
                        </p>
                        <p>Победители и&nbsp;призеры игры, получившие денежные призы, обязаны представить в&nbsp;налоговый орган 
                            по&nbsp;месту своего учета соответствующую декларацию. 
                        </p>
                        <p>Призерами считаются команды, занявшие по&nbsp;результатам игры следующие места: 1, 2, 3, 7, 13, 22, 33, 44, 55
                            В&nbsp;случае меньшего количества команд призовой фонд распределяется с&nbsp;учетом фактического количества команд. 
                        </p>
                        <p>Для получения вознаграждения Пользователю необходимо заполнить уведомление о&nbsp;получении приза с&nbsp;указанием 
                            паспортных данных и&nbsp;обязательным распределением приза среди всех участников команды в&nbsp;равных пропорциях
                        </p>
                        <p>Игра проводится при условии регистрации двадцати и&nbsp;более команд. В&nbsp;противном случае игра переносится 
                            на&nbsp;более позднюю дату или отменяется, о&nbsp;чем все зарегистрировавшиеся Пользователи получают уведомление
                            не&nbsp;позднее 24&nbsp;часов до&nbsp;даты начала мероприятия
                        </p>
                        <p>Призовой фонд:</p>
                        <ul>
                            <li>1&nbsp;место&nbsp;&mdash; 20&nbsp;000 рублей</li>
                            <li>2&nbsp;место&nbsp;&mdash; 10&nbsp;000 рублей</li>
                            <li>3&nbsp;место&nbsp;&mdash; 5&nbsp;000 рублей</li>
                            <li>13&nbsp;место&nbsp;&mdash; 3&nbsp;000 рублей</li>
                            <li>22&nbsp;место&nbsp;&mdash; 3&nbsp;000 рублей</li>
                            <li>33&nbsp;место&nbsp;&mdash; 3&nbsp;000 рублей</li>
                            <li>44&nbsp;место&nbsp;&mdash; 3&nbsp;000 рублей</li>
                            <li>55&nbsp;место&nbsp;&mdash; 3&nbsp;000 рублей</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <!--footer start-->
        <footer>
            <div class="container">
                <div class="footer-line w-100 d-flex align-items-center justify-content-center justify-content-lg-between">
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
