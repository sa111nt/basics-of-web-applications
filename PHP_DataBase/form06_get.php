<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "<h2>Lista pracowników</h2>";

$sql = "SELECT * FROM pracownicy";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["ID_PRAC"] . " " . $row["NAZWISKO"] . "<br/>";
    }
} else {
    echo "Brak pracowników w bazie.";
}

echo "<br><a href='form06_post.php'>Dodaj nowego pracownika</a>";

$result->free();
$link->close();
?>
