<?php
    include "./connection.php";
    
    session_start();
    $tea_id = $_SESSION['teaID'];
    $class_name = strtoupper($_POST['class_name']);
    $full_sub_name = ucwords($_POST['full_sub_name']);

    $sub_name_words = explode(" ",$full_sub_name);
    print_r($sub_name_words);

    $sub_name = '';
    for($i = 0; $i < count($sub_name_words); $i++){
        if(ctype_alpha($sub_name_words[$i][0]))
            $sub_name = $sub_name.$sub_name_words[$i][0];
    }

    $class_id = $class_name."-".$sub_name;

    $query = mysqli_query($con, "INSERT INTO `exam_classes` VALUES (NULL, '$class_id', '$class_name', '$sub_name', '$full_sub_name', '$tea_id');");
    if($query > 0){
        header("location: ../../dashboard/teacher-dashboard/");
    }
    else{
        echo "Not Added";
        // Failed to add SWAL
    }
?>