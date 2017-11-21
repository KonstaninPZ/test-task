<?php

require_once './config_server.php'; // подключаем скрипт
 
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password,$database) 
    or die("Ошибка " . mysqli_error($link));
// if($link){
//     echo "Нет подключения.";
//     $query ="CREATE database test ";
//        $result = mysqli_query($link, $query) or die("Ошибка "
//                . mysqli_error($link)); 
//        if($result)
//        {
//            echo "Выполнение запроса прошло успешно";
//        }
// }
// выполняем операции с базой данных
     
// закрываем подключение
//echo "it works";
//$query ="CREATE Table human_info
//        (
//            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//            first_name VARCHAR(200) NOT NULL,
//            second_name VARCHAR(200) NOT NULL,
//            email VARCHAR(50) NOT NULL
//        )";
//        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
//        if($result)
//        {
//            echo "Создание таблицы прошло успешно";
//        }
$query ="INSERT INTO human_info VALUES(NULL, 'Samsung Galaxy III','Samsumg','asd@mail.ru')";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
       if($result)
       {
           echo "Добавление данных в таблицу прошло успешно";
        }
mysqli_close($link);
