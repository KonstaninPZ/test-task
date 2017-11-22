<?php 
    require_once './Db.php';
    if(isset($_POST['execute'])  && 
            $_POST['operation']!="false"){
        
        if($_POST['operation']=="DELETE" && 
            !empty($_POST['check_human'])){
                Db::delete_human ();
        }
        if($_POST['operation']=="EDIT" && 
            !empty($_POST['check_human'])){
                Db::delete_human ();
        }

    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="js/script.js">
        </script>
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <table id="human_info">
           <tr>
            <th>First name</th>
            <th>Second name</th>
            <th>E-mail</th>
           </tr>
            <?php require_once './Db.php'; Db::show_tables_human();?>
            </table>
            <select name="operation" id="select" size="1">
                <option value="false">Выбрать действие</option>
                <option value="DELETE">Удалить данные </option>
                <option value="EDIT">Редактировать данные</option>
                <option value="ADD">Добавить данные</option>
            </select>
                <input type="submit" value="Выполнить" name="execute" >
       
        </form>
        <?php
                if($_POST['operation']=="ADD" && isset($_POST['execute'])){
            if(isset($_POST['operation']))
                require './add_human.php';
            }
           
           
        ?>
    </body>
</html>
