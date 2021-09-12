<?php
require_once '../inc/logged-verification.php';
if ( !isset($_GET['taskid']) ){
    header("Location:index.php");
}
require_once '../inc/configs.php';
$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $new_task = $_POST['todo-new'] ?? '';
    if( $new_task != ''){
        $sql = "UPDATE tasks SET task=? WHERE taskid=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_task, $_GET['taskid']);
        $stmt->execute();
    }
    if($stmt->affected_rows){
        header("Location:index.php?edited=ok");
    }
    else{
        header("Location:index.php?edited=no");
    }
    $stmt->close();
    $conn->close();

}
?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تودو!</title>
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body dir="rtl">
    <div class="overlay">
        نکن! بخدا رسپانسیو هست :)
    </div>
    <div class="vip-offer">
        <h2>ویژه شوید!</h2>
        <p>با خرید اشتراک ویژه از تمامی امکانات سامانه بهره مند شوید.</p>
    </div>
    <div class="page-container animate__animated animate__fadeInDown">
        <div class="flex-container">
            <?php
            $header_txt =  $_SESSION['name']."عزیز به صفحه ادیت خوش آمدید ";
            include '../inc/header.php';
            ?>
            <form method="POST">
                <div class="input-wrapper">
                    <input type="text" name="todo-new" id="todo-new" placeholder="کارت رو ویرایش کن ;)" class="new-todo"
                        required>
                </div>
                <button type="submit" class="add-todo-btn">
                    <i class="fas fa-check"></i>
                </button>    
                
            </form>   
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
        });
    </script>
</body>

</html>