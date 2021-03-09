<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./dist/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="./node_modules/waypoints/lib/noframework.waypoints.min.js"></script>
    <title>Home Page</title>
</head>

<body id="body">
    <?php
    if (isset($_GET['email']) === true) {
        if ($_GET['email'] == "exist")
            echo '
                    <script>
                        swal("Error", "Email Already Exist!", "error").then(name => {
                                window.location.href = "./";
                        });
                    </script>';
    }

    if (isset($_GET['success']) === true) {
        if ($_GET['success'] == "data-added") {
            echo '<script>
                        swal("Success", "You\'re registered sucessfully!", "success").then(name => {
                                window.location.href = "./";
                        });
                    </script>';
        }
    }
    ?>
    <header>
        <nav class="nav">
            <div class="nav__logo">
                <img src="./resources/images/logo.svg" alt="Logo" id="navLogoImg" style="display: none;">
                <div class="web-name">
                    <p class="nav__web-name" style="margin-left: 10px;">Exam Evaluate</p>
                </div>
            </div>
            <div class="nav__menu">
                <button id="signinBtn" class="white-button nav__button">Sign In</button>
                <button id="signupBtn" class="primary-button nav__button">Register</button>
            </div>
        </nav>
    </header>


    <section class="intro">
        <div style="height: 1px; width: 100%; margin-bottom: 25px;"></div>
        <div class="intro__icon">
            <img style="margin-top: -10px !important;" src="./resources/images/logo.svg" alt="Logo">
        </div>
        <div style="height: 4px; width: 100%;" id="waypoint"></div>
        <div class="intro__head" id="introHeadID">Onscreen Evaluation of Answer sheets</div>
        <div class="body-text intro__body">Onscreen Evaluation or digital answer sheet evaluation provides many advantages for the education institutes to simplify post examination activities leading to result processing.</div>
    </section>
    <section class="why-app">
        <div class="why-app__text">
            <div class="why-app__text__blue-head">
                Why Onscreen marking system ?
            </div>
            <div class="why-app__text__body body-text">
                Onscreen Marking System is useful to evaluate physical copies of the answer sheets in digital format.
                During Covid 19 panademic, education has shifted completly to digital mode. As teachers were never familiar with online mode, this website offers them an easy alternate of checking students answer sheet and examination activities leading to result processing. This helps in reducing screen time as well.
            </div>
        </div>
        <div class="why-app__photo1">
            <img src="./resources/images/why-app-photo.png" alt="why-app?">
        </div>

    </section>
    <!-- Register Sectiton -->
    <section class="register" id="register">
        <div class="register__overlay">

        </div>
        <div class="register__content">
            <div class="register__details">
                <img class="register__cancel" id="rContent" src="./resources/images/cancel.svg" alt="" srcset="">
                <h1>Welcome to Exam Evaluate</h1>
                <div class="register__forms">
                    <img src="./resources/images/signup.jpg" alt="Sign Up">
                    <form action="./resources/php/registration.php" onsubmit="return validateForm()" method="POST" class="form">
                        <input class="form__input" type="text" id="tea_name" name="tea_name" required placeholder="Name">
                        <input class="form__input" type="email" name="tea_email" placeholder="Email ID">
                        <input class="form__input" type="text" name="tea_picture" placeholder="Picture(Google Drive Link)">
                        <input class="form__input" type="password" id="tea_pass" name="tea_pass" required placeholder="Password">
                        <input class="form__input" type="password" id="tea_con_pass" name="tea_con_pass" placeholder="Confirm Password">
                        <button type="submit" class="primary-button" name="submit">Submit</button>
                    </form>
                </div>
            </div>
    </section>

    <!-- Teacher Section -->
    <section class="features">
        <div class="features__heading">
            <img src="./resources/images/feature.svg" alt="Features">
            <h1>Features</h1>
        </div>
        <div class="features__feature">
            <div class="features__feature__teacher feature_box">
                <h1>Teachers</h1>
                <img src="./resources/images/teachers.svg" alt="">
                <ol class="featureList">
                    <li>helps teacher withexamination activities leading to result processing. </li>
                    <li>helps teacher withexamination activities leading to result processing. </li>
                    <li>helps teacher withexamination activities leading to result processing. </li>
                    <li>helps teacher withexamination activities leading to result processing. </li>

                </ol>
            </div>
            <div class="features__feature__teacher feature_box">
                <h1 class="yellow">Student</h1>
                <img src="./resources/images/students.svg" alt="Students">
                <ol class="featureList">
                    <li>helps teacher withexamination activities leading to result processing. </li>
                    <li>helps teacher withexamination activities leading to result processing. </li>
                    <li>helps teacher withexamination activities leading to result processing. </li>
                    <li>helps teacher withexamination activities leading to result processing. </li>

                </ol>
            </div>

        </div>
    </section>

    <!-- Our team -->
    <section class="team">
        <h1>Meet Our Team Members</h1>
        <div class="team__teamMembers">
            <div class="team__teamMember">
                <img src="./resources/images/team-members/deepak.svg" alt="">
                <h2>Deepak Kumar</h2>
            </div>    
            <div class="team__teamMember">
                <img src="./resources/images/team-members/jasveen.svg" alt="">
                <h2>Jasveen Kaur</h2>
            </div>
            <div class="team__teamMember">
                <img src="./resources/images/team-members/kushdeep.svg" alt="">
                <h2>Kushdeep Walia</h2>
            </div>
            <div class="team__teamMember">
                <img src="./resources/images/team-members/aastha.svg" alt="">
                <h2>Aastha Bhasin</h2>
            </div>
            <div class="team__teamMember">
                <img src="./resources/images/team-members/dev.svg" alt="">
                <h2>Devender Kumar</h2>
            </div>
        </div>
        <div class="team__background">
        </div>
        <!-- Test -->
            <h1>Please Visit From Desktop</h1>
        </div>
    </section>
    <script src="./resources/js/script.js"></script>
    <script src="./resources/js/responsive.js"></script>
    <script src="./resources/js/waypoint.js"></script>

</body>

</html>