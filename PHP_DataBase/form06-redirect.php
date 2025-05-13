<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['id_prac']) && is_numeric($_POST['id_prac']) && is_string($_POST['nazwisko'])) {
    $sql = "INSERT INTO pracownicy (id_prac, nazwisko) VALUES (?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);
    
    if ($stmt->execute()) {
        header("Location: form06_get.php");
    } else {
        header("Location: form06_post.php");
    }
    
    $stmt->close();
} else {
    header("Location: form06_post.php");
}

$link->close();
exit();
