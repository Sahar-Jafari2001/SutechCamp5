<?php
require_once '../inc/logged-verification.php';

if( !isset($_GET['taskid']) ){
    header("Location:index.php");
}
require_once '../inc/configs.php';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

$stmt = $conn->prepare("DELETE FROM tasks WHERE taskid=?");
$stmt->bind_param("i", $_GET['taskid']);
$stmt->execute();

if($stmt->affected_rows == 0){
    header("Location:index.php?deleted=notExists"); 
}
else{
    header("Location:index.php?deleted=ok");
}
