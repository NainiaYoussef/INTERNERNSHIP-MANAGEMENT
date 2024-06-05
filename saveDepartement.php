<?php
require_once 'dbconnect.php';
session_start();

if (isset($_POST['saveDepartement'])) {
    try {
        $sql = 'INSERT INTO departement(name, idadmin) VALUES(:n, :ida)';
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':n' => $_POST['name'],
            ':ida' => $_SESSION['iduser']
        ]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['updateDepartement'])) {
    try {
        $sql = 'UPDATE departement SET name=:n WHERE id=:i';
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':n' => $_POST['name'],
            ':i' => $_GET['id']
        ]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
header('Location: departements.php');