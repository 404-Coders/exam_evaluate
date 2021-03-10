<?php
    session_start();
    if(!isset($_SESSION["teaID"]))
    {
        header("location: ../../login?error=not-loggedin");
    }
?>
<?php
    include "../../resources/php/connection.php"; 
    
// session_start();                                         

    if(isset($_GET['classID'])){
        $_SESSION['class_id'] = $_GET['classID'];
        header("location: ../../marks-evaluator/");
    }

    if(isset($_GET['generateExcel'])){
        $_SESSION['class_id'] = $_GET['generateExcel'];
        header("location: ../../resources/php/generateResult.php");
    }

    if(isset($_GET['generatePDF'])){
        $_SESSION['class_id'] = $_GET['generatePDF'];
        header("location: ../../resources/php/classMarksheet.php");
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

    if(sizeof($fetch_class_id) <= 0){
        $count_class = 0;
    }
    else{
        $count_class = count($class_id);
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
                    <p class="nav__web-name" style="margin-left: 10px;">Exam Evaluator</p>
                </div>
            </div>
            <div class="nav__menu">
                <div class="nav__navigation">
                    <img src="<?php echo extractor($tea_pic);?>" alt="">
                    <div class="nav__name"><?php echo $tea_name; ?></div>
                    <button id="logout" class="primary-button" style="font-size:18px">Logout</button>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="class">
            <?php
                for($i = 0; $i < $count_class; $i++){
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
                            <a onclick="showModal('modify<?php echo $i;?>')">
                                <div class="class__tool">
                                    <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/edit.svg" alt=""></div>
                                    <div class="class__tool__desc">Modify</div>
                                </div>
                            </a>
                            <section class="modal_container" id='modify<?php echo $i;?>' style="visibility: hidden;">
                                <div class="create__modal">
                                    <div class="create__modal__head">
                                        <img class="register__cancel" onclick="hideModal('modify<?php echo $i;?>')" src="../../resources/images/cancel.svg" alt="">
                                    </div>
                                    <div class="create__modal__body">
                                        <div class="modal">
                                            <div class="modal_icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 477.873 477.873" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                    <path d="M392.533,238.937c-9.426,0-17.067,7.641-17.067,17.067V426.67c0,9.426-7.641,17.067-17.067,17.067H51.2    c-9.426,0-17.067-7.641-17.067-17.067V85.337c0-9.426,7.641-17.067,17.067-17.067H256c9.426,0,17.067-7.641,17.067-17.067    S265.426,34.137,256,34.137H51.2C22.923,34.137,0,57.06,0,85.337V426.67c0,28.277,22.923,51.2,51.2,51.2h307.2    c28.277,0,51.2-22.923,51.2-51.2V256.003C409.6,246.578,401.959,238.937,392.533,238.937z" fill="#ffffff" data-original="#000000"  class=""/>
                                                    <path d="M458.742,19.142c-12.254-12.256-28.875-19.14-46.206-19.138c-17.341-0.05-33.979,6.846-46.199,19.149L141.534,243.937    c-1.865,1.879-3.272,4.163-4.113,6.673l-34.133,102.4c-2.979,8.943,1.856,18.607,10.799,21.585    c1.735,0.578,3.552,0.873,5.38,0.875c1.832-0.003,3.653-0.297,5.393-0.87l102.4-34.133c2.515-0.84,4.8-2.254,6.673-4.13    l224.802-224.802C484.25,86.023,484.253,44.657,458.742,19.142z" fill="#ffffff" data-original="#000000"  class=""/>
                                                </svg>
                                            </div>
                                            <div class="modal_heading">
                                                <p>Edit Class</p>
                                            </div>
                                            <form action="../../resources/php/modifyClass.php?i=<?php echo $i;?>&classID=<?php echo $class_id[$i];?>" method="POST" id="modifyForm<?php echo $i;?>">
                                                <div class="modal_input">
                                                    <input class="modal_input_box" type="text" id="class_name" name="class_name" placeholder="Class Name">
                                                    <input class="modal_input_box" type="text" id="full_sub_name" name="full_sub_name" placeholder="Full Subject Name">
                                                    <div class="edit-class-buttons">
                                                    <button type="submit" class="modal_input_submit primary-button" name="updateBtn<?php echo $i;?>">Save Changes</button>
                                                    <button type="submit" id="delete_button<?php echo $i;?>" class=" modal_input_submit blue-button" name="delete_button<?php echo $i;?>">Delete Class</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <script>
                                                var updateBtn = document.getElementById('updateBtn<?php echo $i;?>');

                                                updateBtn.addEventListener("click", () => {
                                                    var class_name = document.getElementById('class_name<?php echo $i;?>');
                                                    var full_sub_name = document.getElementById('full_sub_name<?php echo $i;?>');

                                                    if(class_name.value === '' || full_sub_name.value === ''){
                                                        var modifyForm = document.getElementById('modifyForm<?php echo $i;?>');
                                                        modifyForm.removeAttribute('action');
                                                        console.log("removed action");
                                                    }
                                                })
                                            </script>
                                        </div>
                                    </div>
                                </section>
                                <a onclick="showModal('loadStudent<?php echo $i;?>')" >
                                    <div class="class__tool">
                                        <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/load.svg" alt=""></div>
                                        <div class="class__tool__desc">Load Data</div>
                                    </div>
                                </a>
                                <section class="modal_container" id='loadStudent<?php echo $i;?>' style="visibility: hidden;" >
                                    <div id="load" class="create__modal">
                                        <div>
                                            <img class="register__cancel" onclick="hideModal('loadStudent<?php echo $i;?>')" src="../../resources/images/cancel.svg" alt="">
                                        </div>
                                        <div class="create__modal__body">
                                            <div class="modal">
                                                <div class="modal_icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" id="Solid">
                                                            <path d="m239.029 384.97a24 24 0 0 0 33.942 0l90.509-90.509a24 24 0 0 0 0-33.941 24 24 0 0 0 -33.941 0l-49.539 49.539v-262.059a24 24 0 0 0 -48 0v262.059l-49.539-49.539a24 24 0 0 0 -33.941 0 24 24 0 0 0 0 33.941z" fill="#ffffff" data-original="#000000" />
                                                            <path d="m464 232a24 24 0 0 0 -24 24v184h-368v-184a24 24 0 0 0 -48 0v192a40 40 0 0 0 40 40h384a40 40 0 0 0 40-40v-192a24 24 0 0 0 -24-24z" fill="#ffffff" data-original="#000000" /></g></g>
                                                    </svg>
                                                </div>
                                                <div class="modal_heading">
                                                    <p>Load Students</p>
                                                </div>
                                                <form>
                                                    <div class="modal_input">
                                                    <input class="modal_input_box" type="text" id="uploadList<?php echo $i;?>" name="uploadList" required placeholder="Upload List">
                                                        <div class="edit-class-buttons">
                                                        <button type="submit" class="modal_input_submit primary-button" name="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <a onclick="showModal('download_answersheet<?php echo $i;?>')">
                                    <div class="class__tool">
                                        <div class="class__tool__icon"><img src="../../resources/images/teacher-dashboard/export.svg" alt=""></div>
                                        <div class="class__tool__desc">Export</div>
                                    </div>      
                                </a>
                                <section class="modal_container" id="download_answersheet<?php echo $i;?>" style="visibility: hidden;">
                                    <div class="create__modal">
                                        <div>
                                            <img class="register__cancel" onclick="hideModal('download_answersheet<?php echo $i;?>')" src="../../resources/images/cancel.svg" alt="">
                                        </div>
                                        <div class="create__modal__body" id="view-frame" style="height:100%">
                                            <div class="line-1" style="top:0;">
                                                <a href="./?generatePDF=<?php echo $class_id[$i];?>"><div class=" box download-box">
                                                    Export <br> as PDF
                                                </div>
                                                <a href="./?generateExcel=<?php echo $class_id[$i];?>"><div class="box download-box">
                                                    Export <br> as Excel 
                                                </div></a> 
                                            </div>
                                        </div>
                                </div>
                            </section>
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

    <section class="modal_container" id="create_class" style="visibility: hidden;">
        <div class="create__modal">
            <div class="create__modal__head">
                <img class="register__cancel" onclick="hideModal('create_class')" src="../../resources/images/cancel.svg" alt="">
            </div>
            <div class="create__modal__body">
                <div class="modal">
                    <div class="modal_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 477.873 477.873" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <path d="M392.533,238.937c-9.426,0-17.067,7.641-17.067,17.067V426.67c0,9.426-7.641,17.067-17.067,17.067H51.2    c-9.426,0-17.067-7.641-17.067-17.067V85.337c0-9.426,7.641-17.067,17.067-17.067H256c9.426,0,17.067-7.641,17.067-17.067    S265.426,34.137,256,34.137H51.2C22.923,34.137,0,57.06,0,85.337V426.67c0,28.277,22.923,51.2,51.2,51.2h307.2    c28.277,0,51.2-22.923,51.2-51.2V256.003C409.6,246.578,401.959,238.937,392.533,238.937z" fill="#ffffff" data-original="#000000"  class=""/>
                            <path d="M458.742,19.142c-12.254-12.256-28.875-19.14-46.206-19.138c-17.341-0.05-33.979,6.846-46.199,19.149L141.534,243.937    c-1.865,1.879-3.272,4.163-4.113,6.673l-34.133,102.4c-2.979,8.943,1.856,18.607,10.799,21.585    c1.735,0.578,3.552,0.873,5.38,0.875c1.832-0.003,3.653-0.297,5.393-0.87l102.4-34.133c2.515-0.84,4.8-2.254,6.673-4.13    l224.802-224.802C484.25,86.023,484.253,44.657,458.742,19.142z" fill="#ffffff" data-original="#000000"  class=""/>
                        </svg>
                    </div>
                    <div class="modal_heading">
                        <p>Create Class</p>
                    </div>
                    <form action="../../resources/php/addClass.php" method="POST">
                        <div class="modal_input">
                            <input class="modal_input_box" type="text" id="class_name" name="class_name" required placeholder="Class Name">
                            <input class="modal_input_box" type="text" id="full_sub_name" name="full_sub_name" required placeholder="Full Subject Name">
                            <button type="submit" class="modal_input_submit primary-button" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="../../resources/js/teacher-dashboard.js"></script>
    <script src="../../resources/js/responsive.js"></script>
</body>
</html>