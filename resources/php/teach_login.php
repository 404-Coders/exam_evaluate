<?php 
    include './connection.php';
 
    $tea_email = $_POST['tea_email']="munshiyadav@gmail.com"; 
    $tea_pass = $_POST['tea_pass']="innerbeauty"; 
    
    $query = mysqli_query($con, "SELECT * from `teacher_cred` where `tea_email`='$tea_email'");
    if(mysqli_num_rows($query) > 0)
    {
        $query = mysqli_query($con, "SELECT * from `teacher_cred` where `tea_email`='$tea_email' and `tea_pass`='$tea_pass'");
        if(mysqli_num_rows($query) > 0)
        {
            session_start();
            $fetchQuery = mysqli_fetch_all($query);
            $_SESSION["teaID"] = $fetchQuery[0][0];
            header("location: ../../dashboard/teacher-dashboard/");
        }
        else
        {
            echo "pass does not matched";
            //return to main login page and show error popup(pass does not exist)
        }
    }
    else
    {
        echo "email to this id does not match";
        //return to main login page and show error popup(email to this id does not match)
    }
?>