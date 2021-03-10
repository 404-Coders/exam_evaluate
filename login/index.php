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
                    <p class="nav__web-name" style="margin-left: 10px;">Exam Evaluator</p>
                </div>
            </div>
            <div class="nav__menu">
                <div class="nav__navigation">
                    <svg width="50" height="50" viewBox="0 0 50 50"  id="backBtn" onclick="window.location='../'"  fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                        <path d="M46.1955 25C46.1955 37.3063 36.2194 47.2827 23.9131 47.2827C11.6068 47.2827 1.63037 37.3063 1.63037 25C1.63037 12.6937 11.6068 2.71725 23.9131 2.71725C36.2194 2.71725 46.1955 12.6937 46.1955 25Z" fill="#FFC107"/>
                        <path d="M48.3697 26.6304H16.8477C15.9477 26.6304 15.2173 25.9 15.2173 25C15.2173 24.1 15.9477 23.3696 16.8477 23.3696H48.3697C49.2698 23.3696 50.0002 24.1 50.0002 25C50.0002 25.9 49.2698 26.6304 48.3697 26.6304Z" fill="black"/>
                        <path d="M25.5436 35.326C25.126 35.326 24.7088 35.1675 24.3912 34.8479L15.6957 26.1524C15.0588 25.5151 15.0588 24.4825 15.6957 23.8456L24.3912 15.1501C25.0281 14.5132 26.0606 14.5132 26.6979 15.1501C27.3348 15.787 27.3348 16.8196 26.6979 17.4565L19.1544 25L26.6979 32.5436C27.3348 33.1804 27.3348 34.213 26.6979 34.8499C26.3783 35.1675 25.9607 35.326 25.5436 35.326Z" fill="black"/>
                        <path d="M23.9132 48.9132C10.7284 48.9132 0 38.1848 0 25C0 11.8152 10.7284 1.08682 23.9132 1.08682C33.8064 1.08682 42.5414 7.03894 46.1697 16.2523C46.5 17.089 46.0869 18.0348 45.2501 18.3672C44.413 18.6936 43.4673 18.2868 43.1349 17.4457C40.0022 9.48897 32.4566 4.34769 23.9132 4.34769C12.526 4.34769 3.26087 13.6132 3.26087 25C3.26087 36.3868 12.526 45.6523 23.9132 45.6523C32.4566 45.6523 40.0022 40.511 43.1349 32.5567C43.4653 31.7152 44.411 31.3088 45.2501 31.6348C46.0869 31.9652 46.5 32.9129 46.1697 33.75C42.5414 42.961 33.8064 48.9132 23.9132 48.9132Z" fill="black"/>
                        </g>
                    </svg>
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
    <script src="../resources/js/responsive.js"></script>

</body>

</html>