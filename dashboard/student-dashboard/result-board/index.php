<?php 
    session_start();
    if(!$_SESSION['rollNo'])
    {
        header("location: ../../login?error=not-loggedin");
    }
?>
<?php

    include "../../../resources/php/connection.php";  
    $stu_rollNo = $_SESSION["rollNo"];

    //Load student's details
    $query_stu_details = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo` = '$stu_rollNo'");
    $fetch_stu_details = mysqli_fetch_array($query_stu_details);

    $stu_name = $_SESSION["stu_name"];
    $stu_pic = $_SESSION["stu_pic"];
    $class_name =  $_SESSION["class_name"];
    // $class_id = $_SESSION['class_id'];

    //Load Subjects
    $query_classes = mysqli_query($con, "SELECT `sub_name` from `exam_classes` where `class_name`='$class_name' ORDER BY `sub_name`");
    $fetch_classes = mysqli_fetch_all($query_classes);

    $classes = array();

    for($i = 0; $i < count($fetch_classes); $i++ )
    {
        array_push($classes, $fetch_classes[$i][0]);
    }

    // Getting Student Result Table
    $query_exam_result = mysqli_query($con, "SELECT * FROM `exam_result` WHERE `stu_rollNo` ='$stu_rollNo' ORDER BY `sub_name`");
    $fetch_exam_result = mysqli_fetch_all($query_exam_result);

    $result = new stdClass();
    // $fetch_exam_result = json_encode($fetch_exam_result);
    for($i = 0; $i < count($fetch_exam_result); $i++ )
    {
        $key = $fetch_exam_result[$i][4];
        $value = array_slice($fetch_exam_result[$i], 5);
        $result->$key = $value;
    }


    //getting answersheet
    $query_answersheet = mysqli_query($con, "SELECT `sub_name`, `answersheet` FROM `exam_sheet` WHERE `stu_rollNo` ='$stu_rollNo' ORDER BY `stu_rollNo`");
    $fetch_answersheet = mysqli_fetch_all($query_answersheet);
    
    $answersheets = new stdClass();
    for($i = 0; $i < count($fetch_answersheet); $i++ )
    {
        $value = getPreview($fetch_answersheet[$i][1]);
        $key = $fetch_answersheet[$i][0];
        $answersheets->$key = $value;
    }


    




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../../../dist/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
        <title>Exam Sheet</title>
    </head>
    <body>
        <header>
            <nav class="nav">
                <div class="nav__logo">
                    <img src="../../../resources/images/logo.svg" alt="Logo">
                    <div class="classInfo">
                        <p class="nav__className"><?php echo $class_name; ?></p>
                    </div>
                </div>
                <div class="nav__menu">
                    <div class="nav__navigation">
                        <img src="<?php echo $stu_pic;?>" alt="">
                        <div class="nav__name"><?php echo $stu_name; ?></div>
                        <img src="../../../resources/images/back-button.svg" id="backBtn" onclick="window.location='../'" alt="back button">
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
                        for($i = 0; $i<count($classes); $i++)
                        {
                            if($i+1 == 1)
                            {
                                echo '
                                    <div class="answers__sList__item" id= "stu_name-'.$i.'">
                                        <p class="selected">'.$classes[$i].'</p>
                                    </div>
                                ';
                            }
                            else{
                                echo '
                                    <div class="answers__sList__item " id= "stu_name-'.$i.'">
                                        <p>'.$classes[$i].'</p>
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
                        <div class="answers__totalC">
                            <p>Total Marks =&nbsp;<span id="total">00</span></p>
                        </div>
                    </div>
                </form>

            </div>
            <div class="answers__sheet">
                <iframe class="custom-scroll" id="markSheet" src="" frameborder="0"></iframe>
            </div>
        </section>

        <!-- <script src="../../../resources/js/responsive.js"></script> -->
        <script>
            var selectedItem; 
            const table = document.getElementById("test");
            loadResultBoard();
            function loadResultBoard() {
                var result = <?php echo json_encode($result);?>;
                var answersheets = <?php echo json_encode($answersheets);?>;

                var resultSize = Object.keys(result);
                var stu_names = document.querySelectorAll(".answers__sList__item>p");

                for(var i = 0; i < stu_names.length; i++)
                {
                    if(stu_names[i].classList.contains("selected"))
                    {
                        selectedItem = i;
                        var element = document.querySelector("p.selected").innerHTML;
                        var total = document.getElementById("total"); 
                        console.log(element);
                        var answersheet = document.getElementById("markSheet");
                        var marks = result[element];
                        // console.log(element, marks,  answersheets[element]);
                        answersheet.setAttribute("src", answersheets[element]);
                        var i = 0;
                        let str = "", sum = 0;
                        marks.forEach(student_marks => {
                            str+=`
                                <tr class="answers__markTable__mark">
                                    <td>${"Q"+(i+1)}</td>
                                    <td>${student_marks}</td>
                                </tr>
                                `;
                            i++;
                            sum += parseInt(student_marks); 
                        });
                        total.innerHTML = sum;
                        table.innerHTML += str;


                    }
                }

            }
            var student = document.querySelectorAll(".answers__sList__item>p");
            student.forEach(stu => {
                stu.addEventListener("click", function() {
                student.forEach(elem => {
                    if(elem.classList.contains("selected") === true)    
                        elem.classList.remove("selected");
                })
                table.innerHTML = `
                                    <tr class="answers__markTable__heading">
                                        <th>Questions</th>
                                        <th>Marks</th>
                                    </tr>`;
                stu.classList.add("selected");
                loadResultBoard();
                // console.log( "Clicked", selectedItem);
                });
            });  
            
        </script>

    </body>
</html>