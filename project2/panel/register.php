<?php
 $_SESSION['islogin'] = false;
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $name=$_POST['name'] ?? '';
     $email=  $_POST['e-mail']  ?? '';
     $pass=  $_POST['pass']  ?? '';
     if($email !='' && $pass !='' && $name !=''){
         require_once 'inc/configs.php';
         $conn= new mysqli($db_hostname, $db_username, $db_password, $db_database);
         $sql= "INSERT INTO users (name,email, password) VALUES(?,?,?)";
         $stmt= $conn->prepare( $sql );
         $pass=md5($pass);
         $stmt->bind_param("sss", $name ,$email, $pass );
         $res= $stmt->execute();

         if($res){
            // echo '<p>کاربر با موفقیت اضافه شد</p>';
            header("Location:login.php");
         }
         else{
             echo '<p>مشکلی در ثبت کاربر وجود دارد</p>';
         }

         $stmt->close();
         $conn->close();
     }
     else{
         echo "وارد کردن تمام فیلد ها اجباری است.";
     }
 }         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style-entrance.css">
</head>
<body dir="rtl">
    <div class="parent">
        <div class="enterance">
                <form method="POST">
                        <div class="input_c">
                            <label for="name"> نام و نام خانوادگی <span>*</span></label>
                            <input type="text" name="name" id="name" placeholder="مثال :سحر جعفری">
                        </div>
                        
                        <div class="input_c">
                            <label for="e-mail"> ایمیل <span>*</span></label>
                            <input type="email" name="e-mail" id="e-mail" required placeholder="username@gmail.com">
                        </div>
                        
                        
                        <div class="input_c">
                            <label for="pass"> رمز عبور <span>*</span></label>
                            <input type="password" name="pass" id="pass" required placeholder="یک رمز عبور وارد کنید...">
                        </div>
                        
                        
                        <div>
                            <button type="submit">ثبت نام</button>
                            <button type="reset">پاک کن !</button>
                        </div>
                </form>
        </div>
    </div>
</body>
</html>