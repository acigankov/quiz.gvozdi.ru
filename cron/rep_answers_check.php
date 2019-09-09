<?php

if ($_GET['param_token'] == 'ascln23ibgzcj213nzsc8yh') {

    include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    
    if (getRepAnswers()) {
        
        $to = 'acigankov@inbox.ru, v.v.ilyin@yandex.ru';
        $subject = 'Отчет по ответам на дополнительные вопросы';
        $message = 'Отчет по ответам на дополнительные вопросы сформирован, '
                . 'посмотреть отчет можно по ' . 
                '<a href="http://quiz.gvozdimoscow.ru/template/rep_questions.php?param_token=grdasxlfalsmfadasde">ссылке</a>';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                // Дополнительные заголовки
                'From: noreply@gvozdimoscow.ru' . "\r\n" .
                'Reply-To: noreply@gvozdimoscow.ru' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers, '-f noreply@gvozdimoscow.ru');
    }
} 
exit;

