<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
//форма звонка

if (isset($_POST['form_call']) && !empty($_POST)) {

    if (isset($_POST['call_input_name']) && !empty($_POST['call_input_name'])) {
        $name = htmlspecialchars($_POST['call_input_name']);
    } else {
        echo json_encode('Ошибка! данные не переданы ',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    if(strlen($name) < 3) {
        echo json_encode('Ошибка! неккоректный номер телефона, попробуйте еще раз',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    if (isset($_POST['call_input_tel']) && !empty($_POST['call_input_tel'])) {
        $tel = htmlspecialchars($_POST['call_input_tel']);
        $tel_for_bd = preg_replace('~[^0-9]+~','', $tel);
        $tel_for_bd = substr_replace($tel_for_bd,'+7', 0 , 1);
    } else {
        echo json_encode('Ошибка, данные не переданы ',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    if(strlen($tel) != 17) {
        echo json_encode('Ошибка! неккоректный номер телефона, попробуйте еще раз',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    //сохраняем чувака
    if (saveUser($name, $tel_for_bd)) {

        $to = 'acigankov@inbox.ru, v.v.ilyin@yandex.ru, gvozdimsk1@gmail.com, gvozdibron1@yandex.ru';
        $subject = 'quiz.gvozdimoscow.ru Гость ждет звонка';
        $message = 'hello Manager! <br>' . "\r\n"
                . $name . ' ждет звонка и просит перезвонить по номеру : <br>' . "\r\n"
                . $tel;

        // Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                // Дополнительные заголовки
                'From: noreply@gvozdimoscow.ru' . "\r\n" .
                'Reply-To: noreply@gvozdimoscow.ru' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            unset($_POST);
        }

        $result = "Cпасибо за обращение, $name. Наш менеджер свяжется с Вами в ближайшее время.";
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    }
}


//форма брони
elseif (isset($_POST['form_reg']) && !empty($_POST)) {

    //команда
    if (isset($_POST['reg_input_team']) && !empty($_POST['reg_input_team'])) {
        $team = htmlspecialchars($_POST['reg_input_team']);
    } else {
        echo json_encode('Ошибка! данные не переданы! form_reg',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    if(strlen($team) < 3) {
        echo json_encode('Ошибка! Неккоректное имя команды!, попробуйте еще раз',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    //кол-во игроков
    if (isset($_POST['reg_input_gamers_qnt']) && !empty($_POST['reg_input_gamers_qnt'])) {
        $gamers_qnt = htmlspecialchars($_POST['reg_input_gamers_qnt']);
    } else {
        echo json_encode('Ошибка! данные не переданы!reg_input_gamers_qnt',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    if ($gamers_qnt < 2 && $gamers_qnt > 10) {
        echo json_encode('Ошибка! Неккоректное кол-во игроков!, попробуйте еще раз',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    //капитан
    if (isset($_POST['reg_input_name']) && !empty($_POST['reg_input_name'])) {
        $captain = htmlspecialchars($_POST['reg_input_name']);
    } else {
        echo json_encode('Ошибка! данные не переданы! reg_input_gamers_qnt',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    if (strlen($captain) < 3) {
        echo json_encode('Ошибка! Неккоректное имя капитана!, попробуйте еще раз', JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }

    //телефон
    if (isset($_POST['reg_input_tel']) && !empty($_POST['reg_input_tel'])) {
        $tel = htmlspecialchars($_POST['reg_input_tel']);
        //отрезаем лишнее у телефона
        $tel_for_bd = preg_replace('~[^0-9]+~','', $tel);
        $tel_for_bd = substr_replace($tel_for_bd,'+7', 0 , 1);
        
    } else {
        echo json_encode('Ошибка! данные не переданы! reg_input_tel',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    if(strlen($tel) != 17) {
        echo json_encode('Ошибка! неккоректный номер телефона, попробуйте еще раз',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    //email
    if (isset($_POST['reg_input_email']) && !empty($_POST['reg_input_email'])) {
        $email = htmlspecialchars($_POST['reg_input_email']);
    } else {
        echo json_encode('Ошибка! данные не переданы! reg_input_email',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    $pattern_email = "/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i";
    if(!preg_match($pattern_email, $email)) {
        echo json_encode('Ошибка! неккоректный email, попробуйте еще раз',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    //game
    if (isset($_POST['form_reg_gameid']) && !empty($_POST['form_reg_gameid'])) {
        $gameId = htmlspecialchars($_POST['form_reg_gameid']);
    } else {
        echo json_encode('Ошибка! данные не переданы! form_reg_gameid', JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        exit('Ошибка передачи данных');
    }
    
    //сохраняем чувака и команду
    if (saveTeam($team, $captain, $gamers_qnt, $tel_for_bd, $email, $gameId)) {
        //достаем данные для отправки уведомлений
        $game_for_mail = getGameForMail($gameId);
        $game = $game_for_mail['name'];
        $game_date = date("d.m.Y", strtotime($game_for_mail['start_date']));
        $game_time = date("H:i", strtotime($game_for_mail['start_date']));


        //отправляем себе данные об игре
        $to = 'acigankov@inbox.ru, v.v.ilyin@yandex.ru, gvozdimsk1@gmail.com, gvozdibron1@yandex.ru';
        $subject = '«Гвоздатый Квиз». Регистрация на игру';

        $message = 'hello Manager! <br>' . "\r\n"
                . 'Игра : ' . $game . ' <br>' . "\r\n"
                . 'Дата игры : ' . $game_date . ' <br>' . "\r\n"
                . 'Время игры : ' . $game_time . ' <br>' . "\r\n"
                . 'Команда : ' . $team . ' <br>' . "\r\n"
                . 'Капитан : ' . $captain . ' <br>' . "\r\n"
                . 'Кол-во игроков : ' . $gamers_qnt . ' <br>' . "\r\n"
                . 'Телефон  : ' . $tel . ' <br>' . "\r\n"
                . 'Email : ' . $email . ' <br>' . "\r\n";

// Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers = 'Content-type: text/html; charset=utf-8' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
// Дополнительные заголовки
                'From: noreply@gvozdimoscow.ru' . "\r\n" .
                'Reply-To: noreply@gvozdimoscow.ru' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();



        if (mail($to, $subject, $message, $headers)) {
            


            $to = $email;
            $subject = 'Гвоздатый Квиз. Регистрация на игру';

            $message = '<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Спасибо за регистрацию</title>
    </head>
    <body>
    <center>
        <table border="0" cellpadding="" cellspacing="0" style="padding:0; width: 600px;max-width: 100%;margin: 0 auto; text-align: center; font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 20px; font-weight: 600;">
            <tbody>
                <tr>
                    <td>
                        <a href="http://quiz.gvozdimoscow.ru/" target="_blank">
                            <img src="http://quiz.gvozdimoscow.ru/img/logo_200х100.png" width="300" alt="logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 60px 0 20px 0;">Здравствуйте, '. $captain  . '</td>
                </tr>
                <tr>
                    <td>Вы зарегистрировались на самый огвозденный квиз <span style="text-transform: uppercase;">«' . $game . '»</span>, 
                        который состоится 
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px 0; font-size:18px;color: #ffcc00;">' . $game_date  . ' в ' . $game_time . '</td>
                </tr>
                <tr>
                    <td>В пабе «Гвозди» по адресу Воронцовская д.20</td>
                </tr>
                <tr>
                    <td style="padding: 20px 0">В ближайшее время мы свяжемся с Вами для подтверждения брони!</td>
                </tr>
                <tr>
                    <td >C Уважеинем,</td>
                </tr>
                <tr>
                    <td>«Гвоздатый Квиз»</td>
                </tr>
                <tr>
                    <td style="padding: 20px 0">Больше информаци <a style="color: #ffcc00; font-family: Trebuchet MS, Helvetica, sans-serif; font-size: 20px; font-weight: 600;" href="http://quiz.gvozdimoscow.ru/" target="_blank">тут</a>                    
                    </td>
                </tr>
            </tbody>
        </table>
    </center>

    </body>
</html>
';
            
            if (mail($to, $subject, $message, $headers)) {
                unset($_POST);
                $result = "Спасибо за регистрацию , капитан $captain , ждем твою команду на игру!";
                echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
            }
            else {
                exit('Error sending mail to ' . $email);
            }
        }


        //отправляем уведомляшку чуваку. TODO
    }
} 

else {
    
   $result = 'Ошибка отправки данных, попробуйте позднее.';
   echo json_encode($result,  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
   exit('Ошибка передачи данных');
}

?>
