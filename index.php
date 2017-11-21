<?php 
    require_once './Db.php';
    if(isset($_POST['execute']) && 
            !empty($_POST['check_human']) && 
            $_POST['operation']!="false"){
        var_dump ($_POST['check_human']);      
//            if($_POST['operation']=="DELETE")
//                Db::delete_human ();
//            if($_POST['operation']=="ADD")
//                Db::insert_data_to_table ();
            }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script>
            function validate(form){
                fail = validateFirstName(form.first_name.value);
                fail += validateSecondName(form.second_name.value);
                fail += validateEmail(form.email.value)
                if(fail == "") return true;
                else{
                    alert(fail);
                    return false;
                }
            }
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
                <option value="UPDATE">Редактировать данные</option>
                <option value="Add">Добавить данные</option>
            </select>
                <input type="submit" value="Выполнить" name="execute" >
       
        </form>
        <h2>Добавить пользователя</h2>
        <form method="POST" id="add_user" onsubmit="return validate(this)">
        <p>Введите имя:<br> 
        <input type="text" name="first_name" /></p>
        <p>Введите фамилию: <br> 
        <input type="text" name="second_name" /></p>
        <p>Введите электронный адрес: <br> 
        <input type="email" name="email" /></p>
        <input type="submit" name="add_value" value="Добавить">
        </form>
        <?php

        if(isset($_POST['add_value'])){
            require_once './Db.php';
            Db::insert_data_to_table();
        }
        ?>
        <script src="js/script.js"></script>
    </body>
</html>
