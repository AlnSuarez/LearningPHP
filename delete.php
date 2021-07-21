<?php
    require_once './pdo.php';

    if(isset($_POST['user_id'])){
        $sql = "DELETE FROM users WHERE user_id = :zip";
        echo "<pre>\n".$sql."\n</pre>\n";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute( array( ':zip' => $_POST['user_id']));

    }

?>

<html>
<head></head><body>
    <p>delete a user</p>
    <form method="post">
        <p>user id:<input type="text" name="user_id" size="40"></p>
        <input type="submit">
    </form>

</body>




</html>