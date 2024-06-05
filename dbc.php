<?php
function sql($sql){
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "interndb";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    $result = $conn->query($sql);
    return $result;}
?>