<?php
    session_start();
    if(!isset($_SESSION["rollNo"]))
    {
        header("location: ../../login?error=not-loggedin");
    }
?>
<?php 
    include "../../resources/php/connection.php";
    // session_start();
    $stu_rollNo = $_SESSION["rollNo"];

    //Load student's details
    $query_stu_details = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo` = '$stu_rollNo'");
    $fetch_stu_details = mysqli_fetch_array($query_stu_details);

    $_SESSION["stu_name"] = $stu_name = $fetch_stu_details[1];
    $_SESSION["stu_pic"] = $stu_pic = extractor($fetch_stu_details[5]);
    $_SESSION["class_name"] = $stu_class =  $fetch_stu_details[4];
    
    //Load Subjects

    $query_stu_subjects = mysqli_query($con, "SELECT `sub_name` from `exam_sheet` where `stu_rollNo` = '$stu_rollNo' ORDER BY `sub_name`");
    $fetch_stu_subjects = mysqli_fetch_all($query_stu_subjects);
    
    $answersheet_query = mysqli_query($con, "SELECT `answersheet`, `sub_name` from `exam_sheet` where `stu_rollNO`='$stu_rollNo'");
    $fetch_answersheet = mysqli_fetch_all($answersheet_query);

    // print_r($fetch_answersheet);
    
    $answersheets = new stdClass();
    // echo $answersheets;
    for($i = 0; $i < count($fetch_answersheet); $i++ )
    {
        $value = getPreview($fetch_answersheet[$i][0]);
        $key = $fetch_answersheet[$i][1];
        // for($j = 0; $j < 2; $j++ )
            $answersheets->$key = $value;
            // echo $key." ".$value;
    }

    $query_classes = mysqli_query($con, "SELECT `sub_name` from `exam_classes` where `class_name`='$stu_class' ORDER BY `sub_name`");
    $fetch_classes = mysqli_fetch_all($query_classes);

    $classes = array();

    for($i = 0; $i < count($fetch_classes); $i++ )
    {
        array_push($classes, $fetch_classes[$i][0]);
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Dashboard</title>
        <link rel="stylesheet" href="../../dist/css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
        <?php
            if(isset($_GET['error']) === true){
                if($_GET['error'] == "login-first")
                {
                    echo '
                        <script>
                            swal("Error", "Login First", "error").then(name => {
                                    window.location.href = "./";
                            });
                        </script>';
                }
                if($_GET['error'] == "already-uploaded")
                {
                    echo '
                        <script>
                            swal("Error", "Answersheet is already uploaded", "error").then(name => {
                                    window.location.href = "./";
                            });
                        </script>';
                }

                
            }
            if(isset($_GET['success']) === true)
            {
                if($_GET['success'] == "upload-success")
                {
                    echo '
                        <script>
                            swal("Error", "Answer Sheet Upload Sucessfull ", "success").then(name => {
                                    window.location.href = "./";
                            });
                        </script>';
                }
            }
        ?>
        <header>
            <nav class="nav">
                <div class="nav__logo">
                    <img src="../../resources/images/logo.svg" alt="Logo">
                    <div class="classInfo">
                        <p class="nav__className"><?php echo "Class Name"; ?></p>
                        <p class="nav__subjectName"></p>
                    </div>
                </div>
                <div class="nav__menu">
                    <div class="nav__navigation">
                        <img src=<?php echo $stu_pic; ?> alt="">
                        <div class="nav__name"><?php echo $stu_name; ?></div>
                        <button id="logout" class="primary-button" style="font-size:18px">Logout</button>
                    </div>
                </div>
            </nav>
        </header>
        <section>
            <div class="line-1">
                <div class="box" onclick="showModal('show_answersheet')">
                    Show <br> Answer Sheet
                </div>
                <a href="./result-board/index.html">
                    <div class="box">
                        Result Board
                    </div>
                </a>    
            </div>
            <div class="line-2">
                    <div class="box" onclick="showModal('upload_sheet')">
                        Upload Answer Sheet
                    </div>
                    <div class="box" onclick="showModal('download_answersheet')">
                        Download Marksheet
                    </div>
            </div>
        </section>



        <!-- Upload Answersheet Option   -->
        <section class="modal_container" id="upload_sheet" style="visibility: hidden;">
            <div class="create__modal">
                <div class="create__modal__head upload__sheet">
                    <img class="register__cancel" onclick="hideModal('upload_sheet')" src="../../resources/images/cancel.svg" alt="">
                </div>
                <div class="create__modal__body upload__sheet__form register__forms">
                    <form action="./upload-form/upload.php" id="upload_form" method="POST">
                        <svg id="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 477.873 477.873" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                        <g xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M392.533,238.937c-9.426,0-17.067,7.641-17.067,17.067V426.67c0,9.426-7.641,17.067-17.067,17.067H51.2    c-9.426,0-17.067-7.641-17.067-17.067V85.337c0-9.426,7.641-17.067,17.067-17.067H256c9.426,0,17.067-7.641,17.067-17.067    S265.426,34.137,256,34.137H51.2C22.923,34.137,0,57.06,0,85.337V426.67c0,28.277,22.923,51.2,51.2,51.2h307.2    c28.277,0,51.2-22.923,51.2-51.2V256.003C409.6,246.578,401.959,238.937,392.533,238.937z" fill="#ffffff" data-original="#000000"  class=""/>
                            </g>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M458.742,19.142c-12.254-12.256-28.875-19.14-46.206-19.138c-17.341-0.05-33.979,6.846-46.199,19.149L141.534,243.937    c-1.865,1.879-3.272,4.163-4.113,6.673l-34.133,102.4c-2.979,8.943,1.856,18.607,10.799,21.585    c1.735,0.578,3.552,0.873,5.38,0.875c1.832-0.003,3.653-0.297,5.393-0.87l102.4-34.133c2.515-0.84,4.8-2.254,6.673-4.13    l224.802-224.802C484.25,86.023,484.253,44.657,458.742,19.142z" fill="#ffffff" data-original="#000000" class=""/>
                            </g>
                        </svg>
                        <h3>Upload Answer sheet</h3>
                        <select class="upload__sheet__subject" name="subject" id="subjects">
                            <option value="none" selected>Select a Subject</option>
                            <?php 
                                for($i = 0; $i < count($classes); $i++)
                                {
                                    echo "<option value=" .$classes[$i].">".$classes[$i]."</option>";
                                }
                            ?>
                        </select>
                        <input class="form__input" type="text" name="sheet_link" placeholder="Drive link">
                        <button type="submit" class="primary-button" name="submit">Upload</button>
                    </form>
                </div>
            </div>
        </section>


        <!-- Show Answer Sheet Option  -->
        <section class="modal_container" id="show_answersheet" style="visibility: hidden;">
            <div class="create__modal">
                <div class="create__modal__head">
                    <img class="register__cancel" onclick="hideModal('show_answersheet')" src="../../resources/images/cancel.svg" alt="">
                    <div class="subject__sel">
                        <h3 class="subject__sel__heading">Select a Subject</h3>
                        <select class="subject__sel__select" name="subjects" id="show_ans_sub">
                        <?php 
                                for($i = 0; $i < count($fetch_stu_subjects); $i++)
                                {
                                    echo "<option value=" .$fetch_stu_subjects[$i][0].">". $fetch_stu_subjects[$i][0]."</option>";
                                }
                            ?>
                            </select>
                    </div>
                </div>
                <div class="create__modal__body" id="view-frame">
                    <iframe  src="" frameborder="0"></iframe>
                </div>
            </div>
        </section>

        <!-- Download Answer Sheet Option  -->
        <section class="modal_container" id="download_answersheet" style="visibility: hidden;">
            <div class="create__modal">
                <div class="create__modal__head">
                    <img class="register__cancel" onclick="hideModal('download_answersheet')" src="../../resources/images/cancel.svg" alt="">
                </div>
                <div class="create__modal__body" id="view-frame">
                    <div class="line-1">
                        <div class=" box download-box">
                            Export <br> to Email
                        </div>
                        <div class="box download-box">
                            Downlaod <br> to device-width
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <script>
            function hideModal(id)
            {
                var modal = document.getElementById(id);
                modal.style.transition = "all 500ms ease-in-out"
                modal.style.visibility = "hidden";
            }
    
            function showModal(id)
            {
                var modal = document.getElementById(id);
                modal.style.transition = "all 500ms ease-in-out"
    
                modal.style.visibility = "visible";
            }



            var obj = <?php echo json_encode($answersheets);?>;
            var iframe = document.querySelector("#view-frame>iframe");
            var show_ans_sub = document.getElementById("show_ans_sub");
            iframe.setAttribute("src", obj[show_ans_sub.value]);
            show_ans_sub.addEventListener("change", function () {
                console.log("Log: ", show_ans_sub.value);

                iframe.setAttribute("src", obj[show_ans_sub.value]);
                console.log(iframe.getAttribute("src"));

            });
        </script>

        <script>
            var logout = document.getElementById('logout');
            logout.addEventListener("click",()=>{
                window.location.href = "../../resources/php/logout.php";
            })
        </script>

    </body>
</html>