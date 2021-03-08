<?php
    include "../../resources/php/connection.php"; 
    
    function extractor($url)
    {
        if(strpos($url, "drive.google.com") !== false)
        {
            $id = explode('/',$url)[5];
            return "https://drive.google.com/uc?id=".$id;
        }
        else
        {
            return url;
        }
    }
    
    session_start();

    if(isset($_GET['classID'])){
        $_SESSION['class_id'] = $_GET['classID'];
        header("location: ../../marks-evaluator/");
    }

    $tea_id = $_SESSION['teaID'];

    // Retreving Teacher Name
    $query_tea_details = mysqli_query($con, "SELECT `tea_name`,`tea_picture` FROM `teacher_cred` WHERE `tea_id` = '$tea_id'");
    $fetch_tea_details = mysqli_fetch_array($query_tea_details);
    $_SESSION['tea_name'] = $tea_name = $fetch_tea_details[0];
    $_SESSION['tea_pic'] = $tea_pic = $fetch_tea_details[1];
    
    // Retreving Teacher Name
    $query_class_id = mysqli_query($con, "SELECT `class_id`,`full_sub_name` FROM `exam_classes` WHERE `tea_id` = '$tea_id' ORDER BY `class_name`");
    $fetch_class_id = mysqli_fetch_all($query_class_id);

    for($i = 0; $i < sizeof($fetch_class_id); $i++){
        $class_id[$i] = $fetch_class_id[$i][0];
        $full_sub_name[$i] = $fetch_class_id[$i][1];
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../../dist/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="nav">
            <div class="nav__logo">
                <img src="../../resources/images/logo.svg" alt="Logo">
                <div class="web-name">
                    <p class="nav__web-name" style="margin-left: 10px;">Exam Evaluate</p>
                </div>
            </div>
            <div class="nav__menu">
                <div class="nav__navigation">
                    <img src="<?php echo extractor($tea_pic);?>" alt="">
                    <div class="nav__name"><?php echo $tea_name; ?></div>
                    <button id="logout" class="white-button nav__button">Logout</button>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="class">
            <?php
                for($i = 0; $i < count($class_id); $i++){
                    $classID = explode("-", $class_id[$i])[0];
            ?>
                <div class="class__item">
                    <div class="class__num"><?php echo ($i+1);?>.</div>
                    <div class="class__contents">
                        <div class="class__details">
                            <div class="class__name"><?php echo $classID;?></div>
                            <div class="class__sub__name"><?php echo $full_sub_name[$i];?></div>
                        </div>
                        <div class="class__actions">
                            <a href="#">
                                <div class="class__tool">
                                    <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/edit.svg" alt=""></div>
                                    <div class="class__tool__desc">Modify</div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="class__tool">
                                    <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/load.svg" alt=""></div>
                                    <div class="class__tool__desc">Load <br> Students</div>
                                </div>
                            </a>

                            <a href="#">
                                <div class="class__tool">
                                    <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/export.svg" alt=""></div>
                                    <div class="class__tool__desc">Export</div>
                                </div>      
                            </a>
                            <a href="./?classID=<?php echo $class_id[$i];?>">
                                <div class="class__tool">
                                    <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/edit.svg" alt=""></div>
                                    <div class="class__tool__desc">Examine</div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            <?php
                }
            ?>
            <div class="addClass">
                <div class="addClass__circle"></div>
                <div class=""> 
                      
                </div>

                <div class="addClass__plus">
                    <svg onclick="showModal('create_class')" height="426.66667pt" viewBox="0 0 426.66667 426.66667" width="426.66667pt" xmlns="http://www.w3.org/2000/svg"><path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0"/></svg>
                </div>
            </div>
        </div>
    </section>

    <section class="modal_cobtainer" id="create_class" style="visibility: hidden;">
        <div class="create__modal">
            <div class="create__modal__head">
                <img class="register__cancel" onclick="hideModal('create_class')" src="../../resources/images/cancel.svg" alt="">
            </div>
            <div class="create__modal__body"></div>
        </div>
    </section>
    <script src="../../resources/js/teacher-dashboard.js"></script>
</body>
</html>