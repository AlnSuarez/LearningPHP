<?php

include './pdo.php';




if ( isset($_POST['add']) && isset($_POST['make']) && isset($_POST['year']) && isset($_POST['mileage'])) {
    $make = $_POST['make'];
    if (strlen($make) > 1) {
      if (is_numeric($_POST['year']) && is_numeric($_POST['mileage'])) {
        $sql = "INSERT INTO autos (make, year, mileage)
                  VALUES (:make, :year, :mileage)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':make' => htmlentities($_POST['make']),
            ':year' => $_POST['year'],
            ':mileage' => $_POST['mileage']));
        } else {
        
          echo("Mileage and year must be numeric.");
        }
      } else {
        echo ("Make is required.");
      }
}






// Demand a GET parameter
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Alan Suárez Santamaría b1012479</title>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>
    <div class="container">
        <h1>Tracking Autos for <?php
                                if (isset($_GET['name'])) {
                                    echo htmlentities($_GET['name']);
                                } else {
                                    die("Name parameter missing");
                                }
                                ?>
        </h1>

        <form method="post">
            <p>Make: <input type="text" name="make"></p>
            <p>Year: <input type="text" name="year"></p>
            <p>Mileage: <input type="text" name="mileage"></p>
            <input type="submit" value="Add" name="add">
            <input type="submit" name="logout" value="Logout">
        </form>

        <ul>
            <?php

            $stmt2 = $pdo->query('SELECT auto_id, make, year, mileage FROM autos');
            while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>";
                echo $row['year'] . "";
                echo "<b>".htmlentities($row['make']). "</b> /";
                echo $row['mileage'];
                echo "</li>";
            }
            ?>
        </ul>


    </div>
</body>

</html>