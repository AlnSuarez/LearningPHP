<?php
 require_once './pdo.php';
 if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])){
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email,:password)";

    echo "<pre>\n".$sql."\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(   array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
        )
    );

 }

?>


<html>
<head></head><body>
    <p>add a mew user</p>
    <form method="post">
        <p>name:<input type="text" name="name" size="40"></p>
        <p>email:<input type="text" name="email" size="40"></p>
        <p>password:<input type="text" name="password" size="40"></p>
        <input type="submit">
    </form>

</body>




</html>