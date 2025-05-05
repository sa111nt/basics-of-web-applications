<?php 
session_start();
require('funkcje.php');

if (isset($_GET["utworzCookie"]) && isset($_GET["czas"])) {
    $czas = intval($_GET["czas"]);
    setcookie("mojeCookie", "wartość Cookie", time() + $czas, "/");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Test</title>
    <meta charset='UTF-8' />
</head>
<body>
    <?php
    if (isset($_GET["czas"])) {
        echo "<p>Ciasteczko zostało poprawnie utworzone i będzie aktywne przez " . $_GET["czas"] . " sekund.</p>";
    }
    ?>
    <a href="index.php">Wstecz</a>
</body>
</html>
