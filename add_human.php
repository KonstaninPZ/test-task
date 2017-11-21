<?php

?>

<form method="POST" id="add_user" onsubmit="return validate(this)">
            <h2>Добавить пользователя</h2>
            Введите имя:<br> 
            <input type="text" name="first_name" />
            <p>Введите фамилию: <br> 
            <input type="text" name="second_name" /></p>
            <p>Введите электронный адрес: <br> 
            <input type="email" name="email" /></p>
            <input type="submit" name="add_value" value="Добавить">
</form>
