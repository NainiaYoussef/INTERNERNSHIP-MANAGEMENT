<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbconnect.php';
require('dbc.php');
session_start();

if (isset($_POST['saveInternship'])) {
    $a = $_POST['departement'];
    $b = $_POST['intern'];
    $c = $_SESSION['iduser'];
    $d = $_POST['startsat'];
    $e = $_POST['endsat'];
    $sql = "INSERT INTO internship VALUES($a,$b,$c,'$d','$e')";

   $result= sql($sql);

}


if (isset($_POST['updateInternship'])) {
    $id_intern = isset($_POST['idintern']) ? $_POST['idintern'] : null;
    $id_dept = isset($_POST['iddep']) ? $_POST['iddep'] : null;
    $id_admin = isset($_POST['idadmin']) ? $_POST['idadmin'] : null;
    $start = $_POST["startsAt"];
    $end = $_POST["endsAt"];
    $sql = "UPDATE internship SET startsAt ='$start', endsAt ='$end' WHERE iddep =$id_dept  AND idintern =$id_intern  and idadmin=$id_admin";
    $result = sql( $sql);


}


header('Location: internships.php');