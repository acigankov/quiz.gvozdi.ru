<?php

if ($_GET['param_token'] == 'asdaq2e1ddsda451Ezs22') {

    include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

    $to = 'acigankov@inbox.ru';
    $subject = 'cron setGameActiveNot';
    $result = setGameActiveNot() ? $message = 'Крон отработал, игры изменены' : $message = 'Крон отработал';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
    $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            // Дополнительные заголовки
            'From: noreply@gvozdimoscow.ru' . "\r\n" .
            'Reply-To: noreply@gvozdimoscow.ru' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers, '-f noreply@gvozdimoscow.ru');
} 

exit;