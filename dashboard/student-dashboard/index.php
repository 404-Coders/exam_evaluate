<?php 
    include "../../resources/php/connection.php";
    session_start();
    $stu_rollNo = $_SESSION["rollNo"];

    $query_stu_details = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo` = '$stu_rollNo'");
    $fetch_stu_details = mysqli_fetch_array($query_stu_details);

    $_SESSION["stu_name"] = $stu_name = $fetch_stu_details[1];
    $_SESSION["stu_pic"] = $stu_pic = $fetch_stu_details[5];
    

    
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

    </head>
    <body>
        <header>
            <nav class="nav">
                <div class="nav__logo">
                    <img src="../../resources/images/logo.svg" alt="Logo">
                    <div class="classInfo">
                        <p class="nav__className"><?php  ?></p>
                        <p class="nav__subjectName"></p>
                    </div>
                </div>
                <div class="nav__menu">
                    <div class="nav__navigation">
                        <img src=<?php echo $stu_pic; ?> alt="">
                        <div class="nav__name"><?php echo $stu_name; ?></div>
                        <img src="../../resources/images/back-button.svg" id="backBtn" alt="back button">
                    </div>
                </div>
            </nav>
        </header>
        <section>
            <div class="line-1">
                <div class="box" onclick="showModal('show_answersheet')">
                    Show <br> Answer Sheet
                </div>
                <div class="box">
                    Result Board
                </div>
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


        <section class="modal_container" id="upload_sheet" style="visibility: hidden;">
            <div class="create__modal">
                <div class="create__modal__head upload__sheet">
                    <img class="register__cancel" onclick="hideModal('upload_sheet')" src="../../resources/images/cancel.svg" alt="">
                </div>
                <div class="create__modal__body upload__sheet__form register__forms">
                    <form action="" id="upload_form">
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
                        <h3>
                            Upload Answer sheet
                        </h3>
                        <input class="form__input" type="email" name="tea_email" placeholder="Drive link">
                        <button type="submit" class="primary-button" name="submit">Upload</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="modal_container" id="show_answersheet" style="visibility: hidden;">
            <div class="create__modal">
                <div class="create__modal__head">
                    <img class="register__cancel" onclick="hideModal('show_answersheet')" src="../../resources/images/cancel.svg" alt="">
                </div>
                <div class="create__modal__body" id="view-frame">
                    <iframe  src="http://drive.google.com/file/d/1Tp8Ms8qB4Y524VC40Is1ZPxJjvdJ8IK8/preview" frameborder="0"></iframe>
                </div>
            </div>
        </section>

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
        </script>
    </body>
</html>