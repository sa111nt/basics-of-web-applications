<?php 
    session_start(); 
    require_once("funkcje.php"); 

    if (!isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"] != 1) {
        header("Location: index.php");
        exit();
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
    $currentDir = getcwd();
    $uploadDirectory = "/zdjeciaUzytkownikow/";
    
    if (isset($_FILES['myfile'])) {
        $fileName = $_FILES['myfile']['name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];
    
        if ($fileName != "" and (
            $fileType == 'image/png' or $fileType == 'image/jpeg' or
            $fileType == 'image/JPEG' or $fileType == 'image/PNG'
        )) {
            $uploadPath = $currentDir . $uploadDirectory . $fileName;
    
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                echo "Zdjęcie zostało załadowane na serwer FTP<br>";
            }
        }
    }   
    
    echo "<h2>Zalogowano jako: " . $_SESSION["zalogowanyImie"] . "</h2>";
?>

<form action="user.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="submit" name="upload" value="Prześlij plik">
</form>

<?php 
    if (isset($_FILES['myfile'])) {
        $sciezka = "zdjeciaUzytkownikow/" . $fileName;
        if (file_exists($sciezka)) {
            echo "<img src='$sciezka' width='300'>";
        } else {
            echo "<p>Brak zdjęcia użytkownika.</p>";
        }
    }
?>    

<form action="index.php" method="POST">
    <input type="submit" name="wyloguj" value="Wyloguj">
</form>

<p><a href="index.php">Powrót do strony logowania</a></p>

</body>
</html>
