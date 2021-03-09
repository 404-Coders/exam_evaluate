<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../dist/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Login</title>
</head>

<body>
    <?php   
        if(isset($_GET['error']) === true){
            if($_GET['error'] == "wrong_mail")
            {
                echo '
                <script>
                    swal("Error", "Email Not Matched with Provided Roll No!", "error").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }

            if($_GET['error'] == "wrong_pass")
            {
                echo '
                <script>
                    swal("Error", "Password Not Matched!", "error").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }

            if($_GET['error'] == "wrong_roll")
            {
                echo '
                <script>
                    swal("Error", "Roll No. Not Found!", "error").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }

            if($_GET['error'] == "not-loggedin")
            {
                echo '
                <script>
                    swal("Error", "Account not logged in!", "error").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }


            //Error in Teacher's Login 

            if($_GET['error'] == "teacher_wrong_mail")
            {
                echo '
                <script>
                    swal("Error", "Email Not Found!", "error").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }

            if($_GET['error'] == "teacher_wrong_pass")
            {
                echo '
                <script>
                    swal("Error", "Password Not Matched!", "error").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }
        }

        if(isset($_GET['sucess']) === true){
            if($_GET['sucess'] == "login_succ")
            {
                echo '
                <script>
                    swal("Sucess", "Login Sucessful", "success").then(name => {
                            window.location.href = "../login/";
                    });
                </script>';
            }
        }
    ?>

    <header>
        <nav class="nav">
            <div class="nav__logo">
                <img src="../resources/images/logo.svg" alt="Logo">
                <div class="web-name">
                    <p class="nav__web-name" style="margin-left: 10px;">Exam Evaluate</p>
                </div>
            </div>
            <div class="nav__menu">
                <div class="nav__navigation">
                   <a href="../"><img src="../resources/images/back-button.svg" id="backBtn" alt="back button"></a> 
                </div>
            </div>
        </nav>
    </header>

    <section class="login">
        <div class="login__details" id="login_details">
            <div class="login__buttons" id = "login_buttons">
                <h1 >Login as <span id="role">Teacher</span> ?</h1>
                <button id="login_btn1" class="blue-button" > Login</button>
                <button id="login_btn2" class="primary-button">Login</button>
            </div>

        </div>
        <div class="login__form" id="login_form">
            <form id="form" action="../resources/php/student_login.php" method="POST">
                <div class="login__form__teacher">
                    <span id="imgBorder"><img id="loginImg" src="../resources/images/reading.svg" alt="teacher"></span>
                    <p id="role1">Student</p>
                </div>
                <!-- For Teacher -->
                <div id="teacherInput" >
                    <input name="tea_email" disabled type="email" class="input" placeholder="Email" required>
                    <input name="tea_pass" disabled type="password" class="input" placeholder="Password" required>
                    <button class="blue-button" type="submit">Sign In</button>
                </div>
                
                <!-- For Students -->
                 <div id="studentInput">
                    <input name="stu_rollNo" type="tel" class="input2" placeholder="Roll No. " required>
                    <input name="stu_email" type="email" class="input2" placeholder="Email" required>
                    <input name="stu_pass" type="password" class="input2" placeholder="Password" required>
                    <input type="submit" class="primary-button" value="Sign In"/>
                 </div>
            </form>
        </div>
    </section>
    <script src="../resources/js/login.js"></script>
</body>

</html>