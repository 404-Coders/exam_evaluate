<?php
    include "../resources/php/connection.php";  

    session_start();
    $tea_id = $_SESSION['teaID'];
    $query_tea_name = mysqli_query($con, "SELECT `tea_name` FROM `teacher_cred` WHERE `tea_id` = '$tea_id'");
    $fetch_tea_name = mysqli_fetch_array($query_tea_name);
    $tea_name = $fetch_tea_name[0];

    $query_class_table = mysqli_query($con, "SELECT * FROM `exam_classes` WHERE `tea_id` = '$tea_id'");
    $fetch_class_table = mysqli_fetch_array($query_class_table);
    $class_name = $fetch_class_table[2];
    $sub_name = $fetch_class_table[4];

    $query_num_columns = mysqli_query($con, "SELECT count(*) FROM information_schema.columns WHERE table_name ='exam_result';");
    $fetch_num_columns = mysqli_fetch_array($query_num_columns);

    $query_exam_result = mysqli_query($con, "SELECT * FROM `exam_result` WHERE `tea_id` = '$tea_id' AND `sub_name` = '$sub_name' ");
    $fetch_exam_result = mysqli_fetch_array($query_exam_result);
    $stu_rollNo = $fetch_exam_result[1];
    
    $totalMarks = 0;
    for($i = 4; $i < $fetch_num_columns[0]; $i++){
        $totalMarks += $fetch_exam_result[$i];
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../dist/css/style.css">
    <link rel="stylesheet" href="../dist/css/mark-evaluator.css">
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
                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

                <div class="answers__sList__item">
                    <p>1. Kushdeep Singh</p>
                </div>
                <div class="answers__sList__item">
                    <p>2. Aastha Bhasin</p>
                </div>
                <div class="answers__sList__item">
                    <p>3. Devender Kumar</p>
                </div>
                <div class="answers__sList__item selected">
                    <p>4. Deepak Kumar</p>
                </div>

            </div>
        </div>
        <div class="answers__marks">
            <div class="answers__heading">
                <h3>Enter Marks</h3>
            </div>
            <div class="answers__container">
                <div class="answers__container__table custom-scroll">
                    <table class="answers__markTable">
                        <tr class="answers__markTable__heading" >
                            <th>Questions</th>
                            <th>Marks</th>
                        </tr>
                        <?php
                            for($i = 4; $i < $fetch_num_columns[0]; $i++){
                                echo "
                                <tr class='answers__markTable__mark'>
                                    <td>".($i - 3)."</td>
                                    <td>
                                        <input type='number' value='$fetch_exam_result[$i]'>
                                    </td>
                                </tr>
                                ";
                            }
                        ?>                          
                    </table>
                </div>
                <div class="answers__buttons">
                    <img src="../resources/images/add (1).svg" alt="add">
                    <img src="../resources/images/delete.svg" alt="delete">
                </div>
                <div class="answers__totalC">
                    <p>Total = <span id="total"><?php echo $totalMarks; ?></span></p>
                    <button>Submit</button>
                </div>
            </div>

        </div>
        <div class="answers__sheet">
            <iframe class="custom-scroll" src="https://drive.google.com/file/d/1YcSh2-dPpsYqOZAysS7zYGsQBajxtEt0/preview" frameborder="0"></iframe>
        </div>
    </section>
</body>

</html>