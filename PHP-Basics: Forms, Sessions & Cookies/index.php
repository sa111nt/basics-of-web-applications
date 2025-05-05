<?php 
session_start(); 
require('funkcje.php');

if (isset($_POST["wyloguj"])) {
    $_SESSION["zalogowany"] = 0;
    unset($_SESSION["zalogowanyImie"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>

<?php 
echo "<h1>Nasz system</h1>";
?>

<fieldset>
    <legend>Formularz logowania</legend>
    <form action="logowanie.php" method="POST">
        Login: <input type="text" id="login" name="login"><br>
        Hasło: <input type="password" id="haslo" name="haslo"><br>
        <input type="submit" name="zaloguj" value="Zaloguj">
    </form>
</fieldset>

<p><a href="user.php">Przejść do strony użytkownika</a></p>

<fieldset>
    <legend>Tworzenie ciasteczka cookie</legend>
    <form action="cookie.php" method="GET">
        Czas życia ciasteczka (w sekundach): <input type="number" name="czas" id="czas" min="1" required><br>
        <input type="submit" name="utworzCookie" value="Utwórz Cookie">
    </form>
</fieldset>

<fieldset>
    <legend>Status ciasteczka</legend>
    <?php
    if (isset($_COOKIE["mojeCookie"])) {
        echo "<p>Wartość ciasteczka: " . $_COOKIE["mojeCookie"] . "</p>";
    } else {
        echo "<p>Ciasteczko nie istnieje lub wygasło.</p>";
    }
    ?>
</fieldset>

</body>
</html>
