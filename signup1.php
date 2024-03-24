<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="welcome.css" type="text/css"/>
    <title>Welcome</title>

    <style>
        body {
            padding: 0;
            margin: 0;
            background: linear-gradient(to right, #6E1FDA, #27006A);
        }

        .main-container {
            width: 100%;
            height: 500px;
        }

        .sub-container {
            margin: 55px auto;
            height: 56px;
            width: 820px;
            background-color: #170058;
            border-radius: 12px;
            box-shadow: 1px -3px 12px 7px #36007E;
        }

        .wel {
            margin-top: 85px;
            text-align: center;
            color: white;
            font-family: lato;
            font-weight: 900;
            font-weight: bold;
            font-size: 50px;
        }
        body{
    padding:0;
    margin:0;
    background:linear-gradient(to right, #6E1FDA, #27006A);
   }
   .main-container{
    width:100%;
    height:500px;
   }
   .sub-container{
    margin:55px auto;
    height:56px;
    width:820px;
    background-color:#170058;
    border-radius:12px;
    box-shadow: 1px -3px 12px 7px #36007E;

   }

   .wel{
    margin-top:85px;
    text-align:center;
color: white;
    font-family:lato;
    font-weight:900;
    font-weight:bold;
    font-size:50px;
   }
   @font-face{
    font-family:"lato";
    src:"Lato-Regular.ttf";
   }
   .ready{
    margin-top:-20px;
    text-align:center;
    color:white;
    font-family:lato;
    font-weight:100;
    font-size:20px;
    font-style:italic;
   }
   .btn-left{
    padding:13px 20px 13px 20px;
    border-radius:38px;
    border-style:none;
    font-weight:900;
    font-size:15px;
    font-family:lato;
    outline:none;
   box-shadow: 1px -3px 12px 7px #36007E;
   background-color:#170058;
    color:white;
    margin-left: 215px;
    
   }
   .btn-right{
    margin-left:20px;
    padding:13px 28px 13px 20px;
    border-radius:38px;
    border-style:none;
    font-weight:900;
    font-size:15px;
    font-family:lato;
    background-color:#170058;
    outline:none;
    box-shadow: 1px -3px 12px 7px #36007E;
    color:white;
    
   }
   .btn-left:hover{
    background-color:white;
    color:#000000;
    
   }
   .btn-right:hover{
    background-color:white;
    color:#000000;
   }

   .sign-up-heading{
    padding-top:10px;
    text-align:center;
    font-family:lato;
    color:#f5f2fa;
   }
 
   .sign-in{
    height:100%;
    width:100%;
     }
 
   .txt{
    width: 120px;
    font-family: lato;
    display: flex;
    margin-top: 10px;
    align-items: center;
    padding: 15px 130px 15px 20px;
    background: none;
    background-color: rgba(247, 247, 248, 0.4);
   color:#000000;
    border-style: solid;
    border-radius: 30px;
    outline: none;
    border-color: #f1f1f1;

   }
   .txt:hover{
    padding:15px 150px 15px 20px;
    transition:10;
    background-color:white;
   }

   .text:focus{
    padding:15px 150px 15px 20px;
    transition:10;
    background-color:white;
    color:#230162;
   }
   ::placeholder{
    color:#230162;
    font-weight:500;
   }
   .sign-up-input{
    
    display: flex;
    flex-direction: column;
    align-items: center;
   }
   .btn{
    display:flex;
    margin-top:15px;

    padding:15px 50px 15px 50px;
    background:none; 
    background-color:white; 
    color:white;
    border-style:solid;
    border-radius:30px;
    outline:none;
    border-color:#230162;
    text-align:center;
    font-family:lato;
    color:#230162;
    font-size:15px;
    font-weight:900;
   }
   .btn:hover{
    background-color:white;
   }
   .log-in{
     height:100%;
    width:100%;
   }
     
    </style>
</head>

<body>
    <div class="main-container">
        <div class="sub-container">
            <div class="" style="display:block" id="main"></div>
            <div>
                <h1 class="wel">Welcome</h1>
                <h3 class="ready">Are you ready for a great experience?</h3>
                <button class="btn-left" id="sign-up-button">Sign Up<i class="fas fa-arrow-right" style=" padding-left:6px;"></i></button>
                <button class="btn-right" id="reset-password-button">Change Password</button>
                <button class="btn-right" id="sign-in-button"><i class="fas fa-arrow-left" style="padding-right:6px;"></i>Sign In</button>
            </div>
            <div class="form-container" style="display:none;" id="secondView">
                <h1 class="sign-up-heading">Sign Up</h1>
                <form method="post" action="signup2.php" onsubmit="return validateForm()">
                    <div class="sign-up-input">
                        <input type="text" name="username" placeholder="Enter your name" class="txt"/>
                        <input type="email" name="email" placeholder="Enter your email" class="txt"/>
                        <input type="password" name="password" id="password" placeholder="Enter your password" class="txt"/>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="txt"/>
                        <input type="submit" name="signup" value="Sign Up" class="btn"/>
                    </div>
                </form>
            </div>
            <div class="" style="display:none" id="thirdView">
                <h1 class='sign-up-heading'>Login</h1>
                <form method='post' action='login.php'>
                    <div class='sign-up-input'>
                        <input type='text' name='username' placeholder='Username' class='txt'/>
                        <input type='password' name='password' placeholder='Password' class='txt'/>
                        <input type='submit' name='Login' value='Login' class='btn'/> 
                    </div>
                </form>
            </div>
            <div class="" style="display:none" id="changePasswordView">
                <h1 class='sign-up-heading'>Change Password</h1>
                <form method='post' action='changepassword.php'>
                    <div class='sign-up-input'>
                    <input type='text' name='username' placeholder='Username' class='txt'/> 
                        <input type='password' name='old_password' placeholder='Old Password' class='txt'/>
                        <input type='password' name='new_password' placeholder='New Password' class='txt'/>
                        <input type='submit' name='ChangePassword' value='Change Password' class='btn'/> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var btnSignUp = document.getElementById('sign-up-button');
        var btnSignIn = document.getElementById('sign-in-button');
        var btnResetPassword = document.getElementById('reset-password-button');
        var firstView = document.getElementById('main');
        var signUpView = document.getElementById('secondView');
        var loginView = document.getElementById('thirdView');
        var changePasswordView = document.getElementById('changePasswordView');

        btnSignUp.onclick = function () {
            firstView.style.display = "none";
            signUpView.style.display = "block";
            loginView.style.display = "none";
            changePasswordView.style.display = "none";
        }

        btnSignIn.onclick = function () {
            firstView.style.display = "none";
            signUpView.style.display = "none";
            loginView.style.display = "block";
            changePasswordView.style.display = "none";
        }

        btnResetPassword.onclick = function () {
            firstView.style.display = "none";
            signUpView.style.display = "none";
            loginView.style.display = "none";
            changePasswordView.style.display = "block";
        }

        function validateForm() {
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;

            if (password !== confirm_password) {
                alert("Password and confirm password do not match");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
