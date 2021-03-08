<?php
    include "../../resources/php/connection.php";  

    session_start();
    $tea_id = $_SESSION['teaID'];
    
    // Retreving Teacher Name
    $query_class_id = mysqli_query($con, "SELECT `class_id` FROM `exam_classes` WHERE `tea_id` = '$tea_id' ORDER BY `class_name`");
    $fetch_class_id = mysqli_fetch_all($query_class_id);

    if(isset($_SESSION['class_id'])){
        unset($_SESSION['class_id']);
    }
    if(isset($_GET['classID'])){
        $_SESSION['class_id'] = $_GET['classID'];
    }
    if(isset($_SESSION['class_id'])){
        header("location: ../../marks-evaluator/");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div style="width: 100px; height: 50px; background-color: cyan;" class="div">CSE1</div> <br>
        <div style="width: 100px; height: 50px; background-color: cyan;" class="div">CSE2</div> <br>
        <div style="width: 100px; height: 50px; background-color: cyan;" class="div">CSE3</div> <br>
    </body>

    <script>
        var div = document.querySelectorAll('.div');
        var ids = <?php echo json_encode($fetch_class_id);?>;

        for(let i = 0; i < div.length; i++){
            div[i].addEventListener("click",() => {
                var classID = ids[i][0];
                console.log(classID);
                window.location.href = "./?classID="+ classID;
            })
        }
    </script>
</html>