<?php
    include "../resources/php/connection.php";  

    session_start();
    $tea_id = $_SESSION['teaID'];
    
    // Retreving Teacher Name
    $query_tea_name = mysqli_query($con, "SELECT `tea_name` FROM `teacher_cred` WHERE `tea_id` = '$tea_id'");
    $fetch_tea_name = mysqli_fetch_array($query_tea_name);
    $tea_name = $fetch_tea_name[0];

    // Fetching Class Name and Sub Name
    $class_id = $_SESSION['classID'] = "CSE1-ADA";
    $class_details = explode("-",$class_id);    
    $class_name = $class_details[0];
    $sub_name = $class_details[1];

    // Getting Student Details of particular Class
    $query_students = mysqli_query($con, "SELECT `stu_name`,`stu_rollNo` FROM `student_cred` WHERE stu_class ='$class_name'");
    $fetch_students = mysqli_fetch_all($query_students);

    // Getting Student Result Table
    $query_exam_result = mysqli_query($con, "SELECT * FROM `exam_result` WHERE `class_id` ='$class_id'");
    $fetch_exam_result = mysqli_fetch_all($query_exam_result);

    $query_exam_sheet = mysqli_query($con, "SELECT * FROM `exam_sheet` WHERE `class_id` ='$class_id' ORDER BY `stu_rollNo`");
    $fetch_exam_sheet = mysqli_fetch_all($query_exam_sheet);

    // Fetching Number of Columns Affected
    $query_num_columns = mysqli_query($con, "SELECT count(*) FROM information_schema.columns WHERE table_name ='exam_result';");
    $fetch_num_columns = mysqli_fetch_array($query_num_columns);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../dist/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
        <title>Exam Sheet</title>
    </head>
    <body>
        <header>
            <nav class="nav">
                <div class="nav__logo">
                    <img src="../resources/images/logo.svg" alt="Logo">
                    <div class="classInfo">
                        <p class="nav__className"><?php echo $class_name; ?></p>
                        <p class="nav__subjectName"><?php echo $sub_name; ?></p>
                    </div>
                </div>
                <div class="nav__menu">
                    <div class="nav__navigation">
                        <img src="../resources/images/back-button.svg" alt="back button">
                        <img src="../resources/images/settings.svg" alt="">
                    </div>
                    <div class="nav__name"><?php echo $tea_name; ?></div>
                </div>
            </nav>
        </header>
        <section class="answers">
            <div class="answers__sList">
                <div class="answers__heading">
                    <h3>Names</h3>
                </div>
                <div class="answers__sList__items custom-scroll">
                    <?php 
                        for($i = 0; $i<count($fetch_students); $i++)
                        {
                            if($i+1 == 1)
                            {
                                echo '
                                    <div class="answers__sList__item selected" id= "stu_name-'.$i.'">
                                        <p>'.($i+1).'. '.$fetch_students[$i][0].'</p>
                                    </div>
                                ';
                            }
                            else{
                                echo '
                                    <div class="answers__sList__item " id= "stu_name-'.$i.'">
                                        <p>'.($i+1).'. '.$fetch_students[$i][0].'</p>
                                    </div>
                                ';
                            }
                            
                        }
                    ?>
                </div>
            </div>
            <div class="answers__marks">
                <div class="answers__heading">
                    <h3>Enter Marks</h3>
                </div>
                <div class="answers__container">
                    <div class="answers__container__table custom-scroll">
                        <table class="answers__markTable" id="test">
                            <tr class="answers__markTable__heading" >
                                <th>Questions</th>
                                <th>Marks</th>
                            </tr>                         
                        </table>
                    </div>
                    <div class="answers__buttons">
                        <img src="../resources/images/add (1).svg" alt="add">
                        <img src="../resources/images/delete.svg" alt="delete">
                    </div>
                    <div class="answers__totalC">
                        <p>Total =&nbsp;<span id="total">00</span></p>
                        <button>Submit</button>
                    </div>
                </div>

            </div>
            <div class="answers__sheet">
                <iframe class="custom-scroll" id="markSheet" src="" frameborder="0"></iframe>
            </div>
        </section>
        <script>
            const exam_result = <?php echo json_encode($fetch_exam_result); ?>;
            const exam_sheet = <?php echo json_encode($fetch_exam_sheet); ?>;
        </script>
        <script src="../resources/Js/marks-evaluator.js"></script>
    </body>
</html>