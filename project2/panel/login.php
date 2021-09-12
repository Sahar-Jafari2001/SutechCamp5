<?php
session_start();
if( isset($_SESSION['islogin'])  && $_SESSION['islogin']){
    header("Location:tasks/index.php");
}
// echo '<p>'.var_dump($_POST).'</p>';



// $sql= "SELECT email,pass FROM users WHERE email='".$email."' and pass='".$pass."'";
        // $res= $stmt->execute();
        // $results=$res->fetch_assoc();
        // echo var_dump($results);



        // $sql= "SELECT email,pass FROM users";
        // $result= $conn->query($sql);
        // $size= $result->num_rows;
        // $i=false;
        // while($results= $result->fetch_assoc()){
        //     if($results['email']==$email){
        //         $i=true;
        //         if($results['pass'] == $pass){
        //             echo '<p>ورود با موفقیت انجام شد</p>';
        //         }
        //         else{
        //             echo '<p>رمز عبور اشتباه میباشد</p>';
        //         }
        //     }
        //     $i++;
        // }
        // if( !$i ){
        //     echo '<p>ایمیل مورددنظر موجود نمیباشد</p>';
        // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="assets/css/style-entrance.css">
</head>
<body dir="rtl">
    <div class="parent">
        <div class="registeration">
            <form method="POST">
                <div class="input_c">
                    <label for="e-mail">  ایمیل را اینجا وارد کنید... <span>*</span></label>
                    <input type="email" name="e-mail" id="e-mail" required placeholder="username@gmail.com">
                </div>
    
                <div class="input_c">
                    <label for="pass"> رمز عبور <span>*</span></label>
                    <input type="password" name="pass" id="pass" required placeholder="یک رمز عبور وارد کنید...">
                </div>
                <div>
                    <button type="submit"> ورود</button>
                </div>
                <div>
                    <a href="register.php">ثبت نام کنید</a>
                </div>
            </form>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if( isset( $_POST['e-mail'] ) && isset( $_POST['pass'] )){
                    $email= $_POST['e-mail'] ?? '';
                    $pass= $_POST['pass'] ?? '';
            
                    require_once 'inc/configs.php';
                    $conn= new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    $sql= "SELECT userid,name,password FROM users WHERE email=?";
                    $stmt= $conn->prepare($sql);
                    $stmt->bind_param("s",$email);
                    $run_status=$stmt->execute();
            
                    if( !$run_status ){
                        echo 'مشکلی در ارتباط با دیتابیس وجود دارد!';
                    }elseif( ($res = $stmt->get_result())->num_rows == 0 ){
                        // $res = $stmt->get_result();
                        // $res->num_rows
                        echo 'نام کاربری وجود ندارد!';
                    }elseif($result = $res->fetch_assoc()) {
                        if( $result['password'] == md5($pass)){
                            $_SESSION['islogin'] = true;
                            $_SESSION['userid'] = $result['userid'];
                            $_SESSION['name'] = $result['name'];
                            $stmt->close();
                            $conn->close();
                            header("Location: tasks/index.php");
                            exit(); // =~ die();
                        }else{
                            echo 'رمزعبور با ایمیل مطابقت ندارد.';
                        }
                        
                    }
                    $stmt->close();
                    $conn->close();
            
                    // //it gives us an object
                    // $result= $stmt->get_result();
            
                    // if( $result->fetch_assoc()!=NULL ){
                    //     echo '<p>ورود با موفقیت انجام شد</p>';
                    // }
                    // else{
                    //     echo '<p>رمز عبور یا نام کاربری اشتباه میباشد</p>';
                    // }
                    // $conn->close();
                }    
            }
            ?>  
        </div>
    </div>
    
    
</body>
</html>