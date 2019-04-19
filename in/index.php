<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

include_once ROOT . '/config/config.php';

if (setUserFromSmsLinkOuter('первая рассылка', uniqid('from_sms_'))) {
    header("Location: http://quiz.gvozdimoscow.ru"); /* Redirect browser */
    exit;
} else {
    die('ссылка устарела.');
}

?>