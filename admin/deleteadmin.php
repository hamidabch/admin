<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si l'ID de l'admin à supprimer est défini dans la requête
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Préparer et exécuter la requête de suppression
    $sql = "DELETE FROM admins WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Admin deleted successfully";
    } else {
        echo "Error deleting admin: " . $conn->error;
    }
} else {
    echo "Admin ID not provided";
}

// Fermer la connexion
$conn->close();
?>
