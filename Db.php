<?php


/**
 * Description of Db
 *
 * @author Student
 */
class Db {
   
   static function connect_to_db(){
        require './config_server.php';
       // echo "hello";
        
        $link = mysqli_connect($host, $user, $password,$database) 
                            or die("Ошибка " . mysqli_error($link));
        return $link;
    }
    static function insert_data_to_table(){
        
        $link = Db::connect_to_db();
        $first_name = htmlentities(mysqli_real_escape_string($link, $_POST['first_name']));
        $second_name = htmlentities(mysqli_real_escape_string($link, $_POST['second_name']));
        $email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
        
        $query ="INSERT INTO human_info VALUES(NULL, '$first_name','$second_name','$email')";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
           if($result)
           {
               echo "Добавление данных в таблицу прошло успешно";
            }
            mysqli_close($link);
    }
    static function show_tables_human(){
        $link = Db::connect_to_db();
        $query ="SELECT * FROM human_info";
 
        $result = mysqli_query($link, $query)
                or die("Ошибка " . mysqli_error($link)); 
        if($result)
        {
            $rows = mysqli_num_rows($result); // количество полученных строк
            
            //echo "<table><tr><th>Id</th><th>Модель</th><th>Производитель</th></tr>";
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $count=0;
                $row = mysqli_fetch_row($result);
                echo "<pre>";
                var_dump($row);
                echo "</pre>";
                echo "<tr>";
                    for ($j = 0 ; $j < 4 ; ++$j){
                          if($count==0 ){
                                $count++;
                                continue;
                            }
                        echo "<td>$row[$j]</td>";
                    }
                    echo "<td><input name=\"check_human[]\""
                    . " type=\"checkbox\" value=\"".$row[0][$i].
                            "\"><br></td>";
                echo "</tr>";
            }
          //  echo "</table>";
     
            // очищаем результат
            mysqli_free_result($result);
        }
       // mysqli_close($link);
    }
    static function delete_human(){
        if($_POST['operation']=="DELETE"){
      // echo 'Delete',$_POST['execute'];
       $link = Db::connect_to_db();
            for($i=0;$i<count($_POST['check_human']);$i++){
                echo $_POST['check_human'][$i];
//                $sql  = "DELETE FROM human_info"
//                   . " WHERE 'human_info.id' = "
//                   .$_POST['check_human'][$i];
                $sql = "DELETE FROM `human_info` WHERE `human_info`.`id` = ".$_POST['check_human'][$i];
                $rs = mysqli_query($link, $sql)
                 or die("Ошибка " . mysqli_error($link));
                if($rs){
                    echo "delete succeful";
                }
            }    
        }
    }
    
}
