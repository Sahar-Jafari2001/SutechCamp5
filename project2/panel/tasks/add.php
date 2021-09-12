<?php
require_once '../inc/logged-verification.php';
require_once '../inc/configs.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $task = $_POST['todo'] ?? '';
    $id = $_SESSION['userid'];
    if( $task != ''){
        $conn= new mysqli($db_hostname, $db_username, $db_password, $db_database);
        $sql= "INSERT INTO tasks (userid, task) VALUES(?,?)";
        $stmt= $conn->prepare( $sql );
        $stmt->bind_param("is", $id ,$task );
        $res= $stmt->execute();
        if($res){
            $stmt->close();
            $conn->close();
            header("Location:index.php?added=ok");
        }
        else{
            $stmt->close();
            $conn->close();
            header("Location:index.php?added=no");
        }
    }
    else{
        header("Location:index.php?added=no");
    }
}
else{
    header("Location:index.php");
}