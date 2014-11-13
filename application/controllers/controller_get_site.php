<?php

class Controller_Get_Site extends Controller {
        function action_index() {
            $resultSend = false;
            if (isset($_POST['e-mail'])) {
            $check = true;
            if (!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
                echo 'E-mail указан не верно';
                $check = false;
            } else {
                $email = $_POST['e-mail'];  
            }
            if (isset($_POST['text']) && !empty($_POST['text'])) {
                $text = $_POST['text'];
            } else {
                $check = false;
                echo('Текст не может быть пустым');
            }
            if ($check) {
                $mailSMTP = new SendMailSmtpClass('XXIvek.saratov@yandex.ru', 'AsDfGhJkL1234', 'ssl://smtp.yandex.ru', 'XXIvek', 465);
                // заголовок письма
                $headers= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
                $headers .= "From: XXIvek <XXIvek.saratov@yandex.ru>\r\n"; // от кого письмо
                $result =  $mailSMTP->send($email, 'Тема письма', $text, $headers); // отправляем письмо
                // $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Заголовки письма');
                $resultSend = $result;
                if($result === true){
                    echo "Письмо успешно отправлено";
                }else{
                    echo "Письмо не отправлено. Ошибка: " . $result;
                }
            }
        }
            $this->view->generate('get_site.php', 'template_view.php', $resultSend);
    }
}

