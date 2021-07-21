<?php
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=course",'colombo','alan');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>