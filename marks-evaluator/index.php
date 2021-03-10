<?php

    include "../resources/php/connection.php";  

    session_start();
    $tea_id = $_SESSION['teaID'];
    
    // Retreving Teacher Name
    $query_tea_details = mysqli_query($con, "SELECT `tea_name`,`tea_picture` FROM `teacher_cred` WHERE `tea_id` = '$tea_id'");
    $fetch_tea_details = mysqli_fetch_array($query_tea_details);
    $tea_name = $_SESSION['tea_name'];
    $tea_pic = $_SESSION['tea_pic'];

    // Fetching Class Name and Sub Name
    
    $class_id = $_SESSION['class_id'];
    $class_details = explode("-",$class_id);    
    $class_name = $class_details[0];
    $sub_name = $class_details[1];

    $query_class_id = mysqli_query($con, "SELECT `full_sub_name` FROM `exam_classes` WHERE `tea_id` = '$tea_id' AND `class_id` = '$class_id' GROUP BY `full_sub_name`");
    $fetch_class_id = mysqli_fetch_all($query_class_id);
    $full_sub_name = $fetch_class_id[0][0];

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
                        <p class="nav__subjectName"><?php echo $full_sub_name; ?></p>
                    </div>
                </div>
                <div class="nav__menu">
                    <div class="nav__navigation">
                        <img src="<?php echo extractor($tea_pic);?>" alt="">
                        <div class="nav__name"><?php echo $tea_name; ?></div>
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
                                        <p>'.$fetch_students[$i][1].'. '.$fetch_students[$i][0].'</p>
                                    </div>
                                ';
                            }
                            else{
                                echo '
                                    <div class="answers__sList__item " id= "stu_name-'.$i.'">
                                        <p>'.$fetch_students[$i][1].'. '.$fetch_students[$i][0].'</p>
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
                <form action="../resources/php/updatingMarks.php" id="resultId" method="POST">
                    <div class="answers__container">
                        <div class="answers__container__table custom-scroll">
                            <table class="answers__markTable" id="test">
                                <tr class="answers__markTable__heading" >
                                    <th>Questions</th>
                                    <th>Marks</th>
                                </tr>                         
                                <tr class="answers__markTable__mark" style="display: none;">
                                    <td colspan="2"><input type="hidden" name="stu_rollNo" id="stu_rollNo"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="answers__buttons">
                            <img src="../resources/images/add (1).svg" id="addBox" alt="add">
                            <img src="../resources/images/delete.svg" id="delBox" alt="delete">
                        </div>
                        <div class="answers__totalC">
                            <p>Total =&nbsp;<span id="total">00</span></p>
                            <button name ="submit" id="subBtn" type="submit">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="answers__sheet">
                <iframe class="custom-scroll" id="markSheet" src="" frameborder="0"></iframe>
            </div>
        </section>
        <script>
            const exam_result = <?php echo json_encode($fetch_exam_result); ?>;
            const exam_sheet = <?php echo json_encode($fetch_exam_sheet); ?>;
        </script>
        <script src="../resources/js/marks-evaluator.js"></script>
        <script src="./resources/js/responsive.js"></script>

    </body>
</html>