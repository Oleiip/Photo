<?php

/**
 *isset() - проверяет на наличие переменной/значения (равно NULL или нет)
 *empty() - проверяет переменную на пустоту. Обращаю внимание, 0 - для нее тоже пустота!
 **/
if (isset($_POST['name'], $_POST['email'], $_POST['text'])) {
    $name = trim($_POST['name']); #убираем пробелы по краям, если они есть
    $email = trim($_POST['email']); #убираем пробелы по краям, если они есть
    $text = trim($_POST['text']); #убираем пробелы по краям, если они есть
    if (empty($name) || empty($email) || empty($text)) { //если что то не ввели
        echo 'Вы заполнили не все поля!';
    } else { //все поля заполнены, отправляем
        $mailto = 'andreyafrin@mail.ru';
        $subject = 'Сообщение с сайта';
//формируем текст сообщения
        $message = 'Сообщение от пользователя <b>' . $name . '</b><br />';
        $message .= 'E-mail пользователя: <a href="mailto:' . $email . '">' . $email . '</a><br />';
        $message .= 'Текст сообщения:<br />' . $text;
//формируем заголовки (кодировку только, остальное сами добавите по желанию)
        $headers = 'Content-type: text/html; charset=windows-1251';
//отправляем письмо
        $mail = mail($mailto, $subject, $message, $headers);
//проверяем отправку
        if (TRUE === $mail) echo '<h2>Ваше сообщение успешно отправлено!</h2>';
        else echo '<h2>Произошла ошибка при отправке сообщения.</h2>';
//проверку можно записать короче при помощи тернарного оператора, вот так:
//  echo (TRUE === $mail) ? 'Ваше сообщение успешно отправлено!' : 'Произошла ошибка при отправке сообщения.' ;
//тогда нужно будет раскомментировать строчку выше и закомментировать строчки выше с проверкой
    }
}
