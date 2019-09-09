<?php

if ($_GET['param_token'] == 'grdasxlfalsmfadasde') {

    include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

    $rep = getRepAnswers();
} else {
    die('ссылка недействительна');
}

?>

<!DOCTYPE html >
<html lang="ru">
    <head>
        <!--Bootstrap-->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="shortcut icon" href="/img/favicon/favicon.png" type="image/png">
        <title>Отчет по ответам</title>
    </head>
    <body>
        <div class="container">
            <div class="row my-5">
                <h1>Отчет по ответам на доп вопросы.</h1>
                <h3>Отчет сформирован <?= date('d.m.Y') . ' в ' . date('H:i:s'); ?></h3>                 
            </div>
            <div class="row">
                <table class="table table-striped table-bordered table-responsive-lg">
                    <thead>
                        <tr>
                            <th scope="col">Игра</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Команда</th>
                            <th scope="col">Капитан</th>
                            <th scope="col">email</th>
                            <th scope="col">Номер Вопроса</th>
                            <th scope="col">Ответ</th>
                            <th scope="col">Дата Ответа</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rep as $field) : ?>
                            <tr>
                                <td><?= $field['game'] ?></td>
                                <td><?= date('d.m.Y',strtotime($field['game_date'])) ?></td>
                                <td><?= $field['team'] ?></td>
                                <td><?= $field['captain'] ?></td>
                                <td><?= $field['email'] ?></td>
                                <td><?= $field['qst_number'] ?></td>
                                <td><?= $field['answer'] ?></td>
                                <td><?= $field['answer_date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>

</html>
