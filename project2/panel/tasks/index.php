<?php
require_once '../inc/logged-verification.php';
require_once '../inc/configs.php';
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
            $header_txt = "خوش آمدید،". $_SESSION['name'];
            include '../inc/header.php';
            ?>

            <form  action="add.php" method="POST">
                <div class="input-wrapper">
                    <input type="text" name="todo" id="todo" placeholder="یک کار جدید اضافه کن ;)" class="new-todo"
                        required>
                </div>
                <button type="submit" class="add-todo-btn">
                    <i class="fas fa-plus"></i>
                </button>    
                
            </form>

            


            <div class="todo-list-container">
                <?php
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                $sql = "SELECT taskid,task FROM tasks WHERE userid=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i",$_SESSION['userid']);
                $run_status = $stmt->execute();
                ?>
                
                <ul class="list animate__animated animate__fadeInDown">
                <?php
                if( !$run_status ){
                    echo 'مشکلی در ارتباط با دیتابیس وجود دارد!';
                }elseif( ($res = $stmt->get_result())->num_rows == 0){
                    echo 'هیچ تسکی وجود ندارد!';
                }else{
                    while($result = $res->fetch_assoc()) {?>
                        <li class="todo-item">
                            <div class="desc">
                               <?=$result['task']?>
                            </div>
                            <div class="options">
                                <a href="delete.php?taskid=<?=$result['taskid']?>" class="todo-btn-link">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a href="edit.php?taskid=<?=$result['taskid']?>" class="todo-btn-link">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="#" class="todo-btn-link">
                                    <i class="fas fa-check"></i>
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                    $stmt->close();
                    $conn->close();
                }
                ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        // var count = 0;
        // $(window).resize(function () {
        //     // Wrong!!!
        //     // $('.overlay').show().delay(1000).fadeOut();
        //     count++;
        //     if (count >= 3) {
        //         $('.overlay').css('display', 'flex').delay(1000).fadeOut();
        //         count = 0;
        //     }
        // });

        function makeItem(inp) {
            return '<li class="todo-item animate__animated animate__fadeInDown"><div class="desc">'
                + inp
                + '</div> <div class="options"> <button class="todo-btn trash"> <i class="far fa-trash-alt"></i>'
                + ' </button> <button class="todo-btn"> <i class="far fa-edit"></i> </button> <button class="todo-btn">'
                + '<i class="fas fa-check"></i> </button> </div></li>';
        }

        $(document).ready(function () {
            
        });
    </script>
</body>

</html>