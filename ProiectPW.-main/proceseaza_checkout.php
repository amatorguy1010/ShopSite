<?php
// Conexiunea la baza de date
$host = "localhost"; // Host-ul bazei de date
$username = "root"; // Numele utilizatorului bazei de date
$password = ""; // Parola pentru baza de date
$database = "ecommerce"; // Numele bazei de date

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Preia datele din formular
$nume = $_POST['nume'];
$adresa = $_POST['adresa'];

// Introducerea datelor în baza de date
$sql = "INSERT INTO comenzi (nume, adresa) VALUES ('$nume', '$adresa')";

if ($conn->query($sql) === TRUE) {
    header("Refresh:0; url=index.html");
} else {
    echo "Eroare la plasarea comenzii: " . $conn->error;
}

$conn->close();
?>
