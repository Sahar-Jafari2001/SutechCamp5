<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .input_c{
            display: flex;
            flex-direction: column;
            /* justify-content: space-evenly; */
        }
        .input_c:nth-child(n){
            margin-bottom: 12px;
        }
        .enterance{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: white;
            width: 200px;
            height: 400px;
            padding: 20px;
            border-radius: 4px;
        }
        .registeration{
            display: flex;
            flex-direction: column;
            background-color: white;
            width: 200px;
            height: 250px;
            padding: 20px;
            border-radius: 4px;
        }
        .parent{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            flex-wrap: wrap;
            background-color: rgb(68, 68, 255);
            height: 1000px;
            align-items: center;
        }
        input{
            width:150px;
            height: 30px;
            border-radius: 4px;
            border: 2px rgb(235, 234, 234) solid;
            border-collapse: collapse;
            background-color: white;
            padding-right: 13px;
        }
        input[type="date"]{
            padding-left: 13px;
        }
        ::placeholder{
            font-family: Shabnam;
            margin-right: 5px;
        }
        body{
            font-family: Shabnam;
        }
        span{
            color: red;

        }
        button{
            border-collapse: collapse;
            height: 35px;
            width: 70px;
            border-radius: 6px;
            padding: 2px;
            font-family: Shabnam;
            border: none;
        }
        button[type="submit"]{
            background-color: rgb(67, 143, 243);
            color: white;
            margin-bottom: 10px;
        }
    </style>
</head>
<body dir="rtl">
    <div class="parent">
        <div class="registeration">
            <form method="POST">
                <div class="input_c">
                    <label for="e-mail">  ?????????? ???? ?????????? ???????? ????????... <span>*</span></label>
                    <input type="email" name="e-mail" id="e-mail" required placeholder="username@gmail.com">
                </div>
    
                <div class="input_c">
                    <label for="pass"> ?????? ???????? <span>*</span></label>
                    <input type="password" name="pass" id="pass" required placeholder="???? ?????? ???????? ???????? ????????...">
                </div>
                <div>
                    <button type="submit"> ????????</button>
                </div>
                <div>
                    <a href="">?????????????? ?????? ????????!</a>
                </div>
            </form> 
        </div>
        <div class="enterance">
            <form method="POST">
                    <div class="input_c">
                        <label for="name"> ?????? ?? ?????? ???????????????? <span>*</span></label>
                        <input type="text" required name="name" id="name" placeholder="???????? :?????? ??????????">
                    </div>
                    
                    <div class="input_c">
                        <label for="phone"> ?????????? ???????? <span>*</span></label>
                        <input type="number" name="phone" id="phone" required placeholder="???????? :09170000000">
                    </div>
                    
                    <div class="input_c">
                        <label for="birthdate">?????????? ????????</label>
                        <input type="date" name="birthdate" id="birthdate" placeholder="mm/dd/yyyy">
                    </div>
                    
                    
                    <div class="input_c">
                        <label for="e-mail"> ?????????? <span>*</span></label>
                        <input type="email" name="e-mail" id="e-mail" required placeholder="username@gmail.com">
                    </div>
                    
                    
                    <div class="input_c">
                        <label for="pass"> ?????? ???????? <span>*</span></label>
                        <input type="password" name="pass" id="pass" required placeholder="???? ?????? ???????? ???????? ????????...">
                    </div>
                    
                    
                    <div>
                        <button type="submit">?????? ??????</button>
                        <button type="reset">?????? ???? !</button>
                    </div>
            </form>
            <?php
            
            ?>
        </div>
    </div>
    
    
</body>
</html>