<?php
require 'dbconnect.php'; 
require 'dbc.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
   
   
    $sql = "DELETE FROM intern WHERE id =$id";
    $result = sql($sql);
    
    if($result) {
        header("Location: interns.php");
        exit;
    } else {
        echo "Error deleting intern.";
    }
} else {
    header("Location: interns.php");
    exit;
}
?>
