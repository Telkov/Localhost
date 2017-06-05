<?php

 if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
      
      // sleep(3); // Установим задержку выполнения в 3с, только для того, чтобы увидеть в браузере картинку лоадера при отправке данных))   
      
      
      if($_POST[parent_id])  $parent_id = preg_replace('/\D+/i','', $_POST[parent_id]);
      else $parent_id = 0;        

      if(isset($_SESSION['user'])){
          $author = $_SESSION['user']['name'];
      }
      $comment = trim($_POST[comment]);
      
      /* Если имя или комментарий не заполнены, прервем выполнение скрипта и вернем массив 
      с ошибками преобразованный в строку формата JSON c сообщением об ошибке */

//      if(!$author)   $error[author] = 'Введите имя!';
      if(!$comment)  $error[comment] = 'Напишите комментарий!';
      
      if($error)
        exit(json_encode($error));
      
      // Сохраняем данные в БД

      require_once 'models/Database.php';
      $obj = new Database();
      $obj->connectToDb();
      
      $sql = "INSERT INTO comments (parent_id, name, comment, date_add) VALUES ($parent_id, '$author', '$comment', NOW())";
      $result = mysql_query($sql);
      if(!$result) 
      {
        $error[] = 'Произошла ошибка, комментарий не сохранен';
        exit(json_encode($error));
      }
      exit();
} 




?>