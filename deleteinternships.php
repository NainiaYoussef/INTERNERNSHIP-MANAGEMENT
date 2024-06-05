<?php

require 'dbconnect.php'; 
require 'dbc.php';

if(isset($_GET['id_intern']) && !empty($_GET['id_intern']) &&isset($_GET['id_dept']) && !empty($_GET['id_dept']) &&isset($_GET['id_admin']) && !empty($_GET['id_admin']) ) {
    $id_intern = $_GET['id_intern'];
    $id_dept = $_GET['id_dept'];
    $id_admin = $_GET['id_admin'];
   
   
    $sql = "DELETE FROM internship WHERE idintern =$id_intern and iddep=$id_dept and idadmin=$id_admin";
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
